<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $data['bill'] = intval(preg_replace('/[^\d.]/', '', $data['bill']));
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
    }

    public function updateQuote($id, Request $request)
    {
        $quote = Quote::find($id);

        if (!$request->get('user_id')) {
            $user = User::where('email', 'LIKE', '%'.$request->get('email').'%')->first();

            if ($user) {
                $quote->user_id = $user->id;
            } else {
                $newUser = User::create([
                    'name' => $request->get('email'),
                    'email' => $request->get('email'),
                    'type' => 'C',
                    'password' => bcrypt(str_random(6)),
                    'lost_password' => str_random(30),
                ]);

                $emailData = json_encode(
                    [
                        '-resetPasswordUrl-' => url('reset-password') . '/' . $newUser->lost_password,
                    ]
                );

                sendMail(
                    'noreply@sejutasuryaatap.com',
                    'noreply',
                    $newUser->email,
                    $newUser->name,
                    'Reset password',
                    null,
                    $emailData,
                    null,
                    '9d8906f1-d25b-4d4b-b2ba-0e73fcff27b6'
                );

                $quote->user_id = $newUser->id;
            }

            $quote->user_email = $request->get('email');
        } else {
            $user = User::find($quote->user_id);
            $quote->user_email = $user->email;
        }

        $quote->status = 'quotation';
        $quote->save();

        return response()->json([
            'message' => 'Sukses!'
        ]);
    }
}
