<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\VerifyPackage;
use Veritrans_Config;
use Veritrans_Snap;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['order_serial'] = 'ORD/'.substr(str_shuffle("0123456789"), 0, 4).'/'.date('d').'/'.date('m').'/'.date('Y');

        if ($request->get('type') == 'verify') {
            $item = VerifyPackage::find($request->get('item_id'));
            $data['total'] = $item->price;
            $data['fee'] = 0;
            $data['grand_total'] = $item->price;
            $data['note'] = $request->get('company');
        } else {

        }

        $item = Order::create($data);
        return response()->json($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
        return response()->json([]);
    }

    /**
     * @param $params array
     * @param $payment_name string
     * @return Exception|string
     */
    public static function getSnapToken(Request $request)
    {
        Veritrans_Config::$serverKey = env('MIDTRANS_SERVER_KEY');

        if (\App::environment('production')) {
            Veritrans_Config::$isProduction = true;
        } else {
            Veritrans_Config::$isProduction = false;
        }

        Veritrans_Config::$isSanitized = true;
        Veritrans_Config::$is3ds = true;

        $transaction = [
            'transaction_details' => $request->get('transaction_details'),
            'expiry' => [
                'start_time' => date('Y-m-d H:i:s O'),
                'unit' => 'days',
                'duration' => 7
            ],
            'customer_details' => $request->get('customer_details')
        ];

        try {
            return $snapToken = Veritrans_Snap::getSnapToken($transaction);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getCleanOrder()
    {
        $items = Order::has('payment', '=', 0)->get();

        foreach ($items as $i) {
            $i->delete();
        }

        return response()->json([]);
    }
}
