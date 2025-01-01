<?php

namespace App\Http\Controllers\Frontend;

use App\Models\UserInfo;
use App\Models\CourseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function courseOrderStore(Request $request){

        $aamarPay = DB::table('payment_gateways')->first();
        $store_id      = $aamarPay->store_id;
        $signature_kay = $aamarPay->signature_key;

        $transaction_id = rand(000000000000, 999999999999);

        $url = 'https://sandbox.aamarpay.com/jsonpost.php';
        //For Live Transection Use "https://secure.aamarpay.com/jsonpost.php"


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
            "store_id": "'.$store_id.'",
            "tran_id": "'.$transaction_id.'",
            "success_url": "'.route('payment.success').'",
            "fail_url": "'.route('fail').'",
            "cancel_url": "'.route('cancel').'",
            "amount": "10",
            "currency": "BDT",
            "signature_key": "'.$signature_kay.'",
            "desc": "Merchant Registration Payment",
            "cus_name": "Nazmul",
            "cus_email": "nazmul@gmail.com",
            "cus_add1": "House A-55 Road 10",
            "cus_add2": "Jhenaidah, Khulna, Bangladesh",
            "cus_city": "Jhenaidah",
            "cus_state": "Jhenaidah",
            "cus_postcode": "7200",
            "cus_country": "Bangladesh",
            "cus_phone": "+88001700000001",
            "type": "json"
        }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $responseObject = json_decode($response, true);




        if (isset($responseObject['payment_url']) && $responseObject['payment_url'] != null) {
            return redirect($responseObject['payment_url']);
            exit();
        }else{
            return redirect()->route('/')->with('message', 'Payment Url Generation Failed!');
        }


         die;
        $order = new CourseOrder();
        $order->user_id = Auth::user()->id;
        $order->course_id = $request->course_id;
        $order->total_bn = $request->total;
        $order->price_bn = $request->price_bn;
        $order->email = $request->email;
        $order->phone_number = $request->phone_number;
        $order->country = $request->country;
        $order->location = $request->location;
        $order->payment_method = $request->payment_method;
        $order->status = 'pending';
        $order->save();

         // Save info for future checkout if the checkbox is checked
        if ($request->has('save_info')) {
            UserInfo::updateOrCreate(
                ['user_id' => auth()->id()], // Match by user_id
                [
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'country' => $request->country,
                    'location' => $request->location,
                ]
            );
        }

        //coupon destroy
        if(Session::get('discount_amount_bn')){
            Session::forget('discount_amount_bn');
           }


        $message = 'আপনার অর্ডার সফলভাবে সাবমিট হয়েছে।';

       return redirect('/')->with('message', $message );
    }//end method

   //aamarpay payment gateway extra method
//Get success response
public function success(Request $request)
{
    $request_id= $request->mer_txnid;

    //verify the transection using Search Transection API

    $url = "http://sandbox.aamarpay.com/api/v1/trxcheck/request.php?request_id=$request_id&store_id=aamarpaytest&signature_key=dbb74894e82415a2f7ff0ec3a97e4183&type=json";

    //For Live Transection Use "http://secure.aamarpay.com/api/v1/trxcheck/request.php"

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;


}

    public function fail(Request $request){
        return $request;
    }

    public function cancel(){
        return 'Canceled';
    }
}
