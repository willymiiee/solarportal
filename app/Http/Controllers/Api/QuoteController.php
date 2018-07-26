<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config as GlobalConfig;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Quote;
use App\Models\User;
use Config;

class QuoteController extends Controller
{
    public function postQuote(Request $request)
    {
        $data = $request->all();
        $condition = false;

        if (!$data['user_id']) {
            // *update 8 July : disable recaptcha

            // $recaptchaData = [
            //     "secret" => env('RECAPTCHA_SECRET_KEY'),
            //     "response" => $data['g-recaptcha-response'],
            //     "remoteip" => $data['ip']
            // ];
            // $client = new \GuzzleHttp\Client;
            // $response = $client->post("https://www.google.com/recaptcha/api/siteverify", ['form_params' => $recaptchaData]);
            // $recaptchaResult = json_decode($response->getBody());
            // $condition = $recaptchaResult->success;

            // remove this part if recaptcha enabled again
            $condition = true;
        } else {
            $condition = true;
        }

        if ($condition) {
            $data['bill'] = intval(preg_replace('/\./', '', $data['bill']));
            $usePerDay = max(0, number_format($data['bill'] / (Config::get('constants.pln_tld') * 30 * Config::get('constants.nett_tdl')) - (40 * ($data['capacity']/1000)/30), 1));
            $pvRequired = $usePerDay / Config::get('constants.sun_hour');
            $pvAllowed = round(min($pvRequired, $data['capacity'] > 0 ? $data['capacity']/1000 : 1000) * 1000, -2) / 1000;
            $cost = $pvAllowed * Config::get('constants.cost_kw');
            $roofArea = $pvAllowed * Config::get('constants.panel_area') * 1000;
            $consumption = number_format($data['bill'] / (Config::get('constants.pln_tld') * 30 * Config::get('constants.nett_tdl')), 2);
            $newUsage = round((1 - Config::get('constants.day_share')) * $consumption * 30 * Config::get('constants.pln_tld') * Config::get('constants.nett_tdl'), -3);
            $exported = ($pvAllowed * Config::get('constants.sun_hour') - Config::get('constants.day_share') * $consumption) * 30 * Config::get('constants.pln_tld');
            $newBill = $newUsage - $exported;
            $saving = $data['bill'] - $newBill;
            // $saving = max(0, ($pvAllowed * Config::get('constants.sun_hour') * Config::get('constants.pln_tld') * 30) - ($data['capacity']/1000 * 40 * Config::get('constants.pln_tld')));

            $data = array_merge($data, [
                'use_per_day' => $usePerDay,
                'pv_required' => $pvRequired * 1000,
                'pv_allowed' => $pvAllowed * 1000,
                'cost' => $cost,
                'consumption' => $consumption,
                'new_usage' => $newUsage,
                'exported' => $exported,
                'new_bill' => $newBill,
                'saving' => $saving,
                'status' => 'calculator'
            ]);

            $quote = Quote::create($data);

            return response()->json([
                'id' => $quote->id,
                'user_id' => $quote->user_id,
                'use_per_day' => $usePerDay,
                'pv_required' => $pvRequired * 1000,
                'pv_allowed' => $pvAllowed * 1000,
                'cost' => ceil($cost),
                'roof_area' => $roofArea,
                'consumption' => $consumption,
                'new_usage' => $newUsage,
                'exported' => $exported,
                'new_bill' => $newBill,
                'saving' => ceil($saving)
            ]);
        } else {
            return response()->json([
                'error' => 'recaptcha failed!'
            ], 500);
        }
    }

    public function updateQuote($id, Request $request)
    {
        $quote = Quote::find($id);

        if (!$request->get('user_id')) {
            $user = User::where('email', 'LIKE', '%'.$request->get('email').'%')->first();

            if ($user) {
                $quote->user_id = $user->id;
            } else {
                $user = User::create([
                    'name' => $request->get('email'),
                    'email' => $request->get('email'),
                    'type' => 'C',
                    'password' => bcrypt(str_random(6)),
                    'lost_password' => str_random(30),
                ]);

                $emailData = json_encode(
                    [
                        '-resetPasswordUrl-' => url('reset-password') . '/' . $user->lost_password,
                    ]
                );

                sendMail(
                    'noreply@sejutasuryaatap.com',
                    'noreply',
                    $user->email,
                    $user->name,
                    'Reset password',
                    null,
                    $emailData,
                    null,
                    '9d8906f1-d25b-4d4b-b2ba-0e73fcff27b6'
                );

                $quote->user_id = $user->id;
            }

            $quote->user_email = $request->get('email');
        } else {
            $user = User::find($quote->user_id);
            $quote->user_email = $user->email;
        }

        $quote->status = 'quotation';
        $quote->is_related = $request->has('is_related') ? $request->get('is_related') : 0;
        $quote->plan_to_install = $request->get('plan_to_install');
        $quote->phone = $request->get('phone');
        $quote->address = $request->get('address');
        $quote->tnc = $request->has('tnc') ? $request->get('tnc') : 0;

        $quote->save();

        $quoteAdmin = GlobalConfig::where('key', 'quote_email')->first();
        $emailData = json_encode(
            [
                '-senderName-' => $user->name,
                '-senderEmail-' => $user->email,
                '-senderPhone-' => $user->phone
            ]
        );

        sendMail(
            'noreply@sejutasuryaatap.com',
            'noreply',
            $quoteAdmin->value,
            'Admin Solar Quote',
            'New Quote',
            null,
            $emailData,
            null,
            'b83bf718-2612-413e-9fe9-13d9914e01b1'
        );

        return response()->json([
            'message' => 'Sukses!'
        ]);
    }
}
