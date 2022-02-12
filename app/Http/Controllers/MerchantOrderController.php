<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;

class MerchantOrderController extends Controller
{
    //Home function
	public  function Home(){

        $user=Auth::user();
        $merchant_id=$user->merchant_id;
         
        $orders=Order::where('merchant_id',$merchant_id)
                        ->where('used_flag',0)
                        ->orderBy('created_at','Asc')->get();

		return view('merchantreports.merchant_orders',compact('orders') );

	}//end fo the getform function

    //Medic Orderement to a patient
    public function Order($id){
        
        $order_id=$id;
        $order=Order::find($order_id);
        
        $update=array(
            'used_flag'=>1
        );
        $order->update($update);
        Session::flash('message', 'Successfully upated details');
        return Redirect::to('merchanthome');
    }
}
