<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Package;
use App\Models\UserInfo;
use App\Models\CourseOrder;
use App\Models\PackageOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function courseOrderStore(Request $request){

        $course_id =$request->course_id;//opt_d passed
        $cus_email = $request->email;//cus_email passed
        $total_bn =  $request->total;//amount passed
        $price_bn = $request->price_bn;//opt_c passed
        $phone_number = $request->phone_number; //cus_phone passed
        $country = $request->country;//opt_a passed
        $location = $request->location;//opt_b passed
        $payment_method = $request->payment_method;//cus_name passed

        $aamarPay = DB::table('payment_gateways')->first();
        $store_id      = $aamarPay->store_id;
        $signature_key = $aamarPay->signature_key;

        $transaction_id = rand(000000000000, 999999999999);

        if($aamarPay->status=='1'){
            $url = 'https://secure.aamarpay.com/jsonpost.php';
        } else {
            $url = 'https://sandbox.aamarpay.com/jsonpost.php';
        }

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
            "amount": "'.$total_bn.'",
            "currency": "BDT",
            "signature_key": "'.$signature_key.'",
            "desc": "Merchant Registration Payment",
            "cus_name": "'.$payment_method .'",
            "cus_email": "'.$cus_email.'",
             "cus_phone": "'.$phone_number.'",
              "opt_a": "'.$country.'",
              "opt_b": "'.$location.'",
              "opt_c":"'. $price_bn.'",
              "opt_d":"'.$course_id.'",
            "type": "json"
        }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        //you can pass multiple data as "opt_c": "'.Auth::user()->id.':'.$course_id.'",

        $response = curl_exec($curl);

        curl_close($curl);

        $responseObject = json_decode($response, true);


        if (isset($responseObject['payment_url']) && $responseObject['payment_url'] != null) {
            $paymentUrl = $responseObject['payment_url'];
            // dd($paymentUrl);
            return redirect()->away($paymentUrl);
        }else{
            return redirect('/')->with('message', 'Payment Url Generation Failed!');
        }

    }//end method

   //aamarpay payment gateway extra method
//Get success response for course order
public function success(Request $request)
{
    //if you pass data as  "opt_c": "'.Auth::user()->id.':'.$course_id.'", format then you have to receive as:
    // Extract opt_c value
    //$opt_c = $request->input('opt_c');
    // Split by delimiter
    //[$user_id, $course_id] = explode(':', $opt_c);
    //return $request; die;

      //insert course  order
       $order = new CourseOrder();
        $order->user_id = Auth::user()->id;
        $order->course_id = $request->opt_d;
        $order->total_bn = $request->amount;
        $order->price_bn = $request->opt_c;
        $order->email = $request->cus_email;
        $order->phone_number = $request->cus_phone;
        $order->country = $request->opt_a;
        $order->location = $request->opt_b;
        $order->payment_method = $request->cus_name;
        $order->status = 'received';
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


    $request_id= $request->mer_txnid;
    $aamarPay = DB::table('payment_gateways')->first();
    $store_id      = $aamarPay->store_id;
    $signature_key = $aamarPay->signature_key;

    //verify the transection using Search Transection API
if($aamarPay->status=='1'){
    $url = "http://secure.aamarpay.com/api/v1/trxcheck/request.php?request_id=$request_id&store_id=$store_id&signature_key=$signature_key&type=json";
} else {
    $url = "http://sandbox.aamarpay.com/api/v1/trxcheck/request.php?request_id=$request_id&store_id=$store_id&signature_key=$signature_key&type=json";
} //For Live Transection Use "http://secure.aamarpay.com/api/v1/trxcheck/request.php"

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
    $message = 'আপনার অর্ডার সফলভাবে সাবমিট হয়েছে।';

    return redirect('/')->with('message', $message );


}

    public function fail(Request $request){
        return $request;
    }

    public function cancel(){
        return 'Canceled';
    }

    //=============================== package order====================================
    public function packageOrderStore(Request $request){
        $package_id =$request->package_id;//opt_d passed
        $cus_email = $request->email;//cus_email passed
        $order_total_bn =  $request->order_total_bn;//amount passed
        $price_bn = $request->price_bn;//opt_c passed
        $phone_number = $request->phone_number; //cus_phone passed
        $country = $request->country;//opt_a passed
        $location = $request->location;//opt_b passed
        $payment_method = $request->payment_method;//cus_name passed

        $aamarPay = DB::table('payment_gateways')->first();
        $store_id      = $aamarPay->store_id;
        $signature_key = $aamarPay->signature_key;

        $transaction_id = rand(000000000000, 999999999999);

        if($aamarPay->status=='1'){
            $url = 'https://secure.aamarpay.com/jsonpost.php';
        } else {
            $url = 'https://sandbox.aamarpay.com/jsonpost.php';
        }

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
            "success_url": "'.route('package.payment.success').'",
            "fail_url": "'.route('fail').'",
            "cancel_url": "'.route('cancel').'",
            "amount": "'.$order_total_bn.'",
            "currency": "BDT",
            "signature_key": "'.$signature_key.'",
            "desc": "Merchant Registration Payment",
            "cus_name": "'.$payment_method.'",
            "cus_email": "'.$cus_email.'",
             "cus_phone": "'.$phone_number.'",
              "opt_a": "'.$country.'",
              "opt_b": "'.$location.'",
              "opt_c":"'. $price_bn.'",
              "opt_d":"'.$package_id.'",
            "type": "json"
        }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        //you can pass multiple data as "opt_c": "'.Auth::user()->id.':'.$course_id.'",

        $response = curl_exec($curl);

        curl_close($curl);

        $responseObject = json_decode($response, true);


        if (isset($responseObject['payment_url']) && $responseObject['payment_url'] != null) {
            $paymentUrl = $responseObject['payment_url'];
            // dd($paymentUrl);
            return redirect()->away($paymentUrl);
        }else{
            return redirect('/')->with('message', 'Payment Url Generation Failed!');
        }

    }//end method

    //aamarpay package success method
    public function successPackage(Request $request){
         //insert package  order
       $order = new PackageOrder();
       $order->user_id = Auth::user()->id;
       $order->package_id = $request->opt_d;
       $order->order_total_bn = $request->amount;
       $order->price_bn = $request->opt_c;
       $order->email = $request->cus_email;
       $order->phone_number = $request->cus_phone;
       $order->country = $request->opt_a;
       $order->location = $request->opt_b;
       $order->payment_method = $request->cus_name;
       $order->status = 'received';
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


   $request_id= $request->mer_txnid;
   $aamarPay = DB::table('payment_gateways')->first();
   $store_id      = $aamarPay->store_id;
   $signature_key = $aamarPay->signature_key;

   //verify the transection using Search Transection API
if($aamarPay->status=='1'){
   $url = "http://secure.aamarpay.com/api/v1/trxcheck/request.php?request_id=$request_id&store_id=$store_id&signature_key=$signature_key&type=json";
} else {
   $url = "http://sandbox.aamarpay.com/api/v1/trxcheck/request.php?request_id=$request_id&store_id=$store_id&signature_key=$signature_key&type=json";
} //For Live Transection Use "http://secure.aamarpay.com/api/v1/trxcheck/request.php"

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
   $message = 'আপনার অর্ডার সফলভাবে সাবমিট হয়েছে।';

   return redirect('/')->with('message', $message );


    }//end method
}
