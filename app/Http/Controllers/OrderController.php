<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bundle;
use App\Merchant;
use App\Order;
use Auth;
use DB;
use Session;
use Carbon;


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
        //return the form to create a treat record
        $packages=Bundle::get();
        
        return view('orders.create',compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Get the inputs
        $location=$request->input('location');
        $other=$request->input('other');
        
        $amount=500;
        
        $user_id=Auth::user()->id;

        DB::beginTransaction();

        //Check there is a medic with that location
        if(Merchant::where('location',$location)->exists()){
            $location_flag=1;
            $merchant=Merchant::where('location',$location)->first();
            $merchant_id=$merchant->id;
            $merchant=Merchant::find($merchant_id);

            $code=Rand(10000,4);
			//Create the record of the account in the ledger
			$order=Order::create([
				'location'=>$location,
                'location_flag'=>$location_flag,
                'other'=>$other,
                'bundle_id'=>1,
				'user_id'=>$user_id, 
                'merchant_id'=>$merchant_id,
                'code'=>$code,
                'amount'=>$amount
			]);

        }else{
            $location_flag=0;
            //Create the record of the account in the ledger
			$order=Order::create([
				'location'=>$location,
                'location_flag'=>$location_flag,
                'other'=>$other,
                'bundle_id'=>2,
				'user_id'=>$user_id, 
                'merchant_id'=>0,
                'code'=>0,
                'amount'=>0
			]);

            Session::flash('message', 'Merchant not found in'. $location);
            return redirect('order/create');
        }
       
 
        DB::commit();

        if($order){
            Session::flash('message', 'Found merchant to deliver');
            return view('orders.create_update',compact('order','merchant'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get the user active payments
        $orders=Order::where('user_id',$id)
                        ->where('used_flag',0)->get();
         

        return view('orders.myorders',compact('orders'));
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
        $order=Order::find($id);
        $amount=$order->amount;
        $merchant_amount=(0.75*$amount);
        $company_amount=(0.25*$amount);
        $status=1;
        $user_id=Auth::user()->id;
        
        $update=array(
            'status'=>$status,
            'merchant_amount'=>$merchant_amount,
            'company_amount'=>$company_amount,
            'rate'=>25
        );

        $order->update($update); 

        return redirect('order/'.$user_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
