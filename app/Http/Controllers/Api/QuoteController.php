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
            $usePerDay = number_format(0.9 * $data['bill'] / (Config::get('constants.pln_tld') * 30), 1);
            $pvRequired = $usePerDay / Config::get('constants.sun_hour');
            $pvAllowed = round(min($pvRequired, $data['capacity'] > 0 ? $data['capacity']/1000 : 1000) * 1000, -2) / 1000;
            $cost = $pvAllowed * Config::get('constants.cost_kw');
            $roofArea = $pvAllowed * Config::get('constants.panel_area') * 1000;
            $saving = $pvAllowed * Config::get('constants.sun_hour') * Config::get('constants.pln_tld') * 30;

            $data = array_merge($data, [
                'use_per_day' => $usePerDay,
                'pv_required' => $pvRequired * 1000,
                'pv_allowed' => $pvAllowed * 1000,
                'cost' => $cost,
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
