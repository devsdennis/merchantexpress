<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medic;
use App\Merchant;
use App\User;
use Auth;
use Session;
use Redirect;
use DB;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchants=Merchant::all();	 		 
		return view('merchants.index',compact('merchants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('merchants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title=$request->input('title');
        $description=$request->input('description');
        $location=$request->input('location');
        $pmethod=$request->input('pmethod');
        $telephone=$request->input('telephone');
        $account=$request->input('account');
        $email=$request->input('email');
         
        $user_id=Auth::user()->id;

        DB::beginTransaction();
	
			//Create the record of the account in the ledger
			$merchant=Merchant::create([
				'title'=>$title,
				'description'=>$description,
                'email'=>$email,
                'account'=>$account,
                'pmethod'=>$pmethod,
                'telephone'=>$telephone,
                'location'=>$location,
				'user_id'=>$user_id, 
			]);
            $merchant_id=$merchant->id;

            User::create([
                'name' => $title,
                'username'=>$email,
                'telephone' => $telephone,
                'email' => $email,
                'active'=>1,
                'password' => bcrypt($request->input('email')),
                'merchant_flag'=>'1',
                'verify'=>'1',
                'code'=>$telephone,
                'merchant_id'=>$merchant_id
            ]);
    
 
        DB::commit();
        
		if($merchant){
        Session::flash('message', 'Successfully created merchant record');
        return Redirect::to('merchants');
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
        $new=Merchant::find($id);
		
     	DB::beginTransaction();	
				 
		$new->delete();

		DB::commit();
		Session::flash('message', 'Successfully deleted the merchant record');
        return Redirect::to('merchants');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
		$merchant= Merchant::find($id);

        // show the edit form and pass the dozen
        return View('merchants.edit',compact('merchant'));
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
        $merchant=Merchant::find($id);

        $merchant->update($request->input());

        if($merchant)
        {
            Session::flash('message', 'Successfully updated the merchant record');
            return Redirect::to('merchants');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merchant=Merchant::find($id);
		
     	DB::beginTransaction();	
				 
		$merchant->delete();

		DB::commit();
		Session::flash('message', 'Successfully deleted the merchant record');
        return Redirect::to('merchants');
    }

    //Function to read medics
    public function readmedics(){
        
        $merchants=Merchant::orderBy('created_at','asc')->get();

        return view('merchants.medics_view',compact('packages'));
    }
}
