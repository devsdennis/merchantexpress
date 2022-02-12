<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bundle;
use Auth;
use Session;
use Redirect;
use DB;

class BundleControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bundles=Bundle::all();	 		 
		return view('bundles.index',compact('bundles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('bundles.create');
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
        $amount=$request->input('amount');
        $user_id=Auth::user()->id;

        DB::beginTransaction();
	
			//Create the record of the account in the ledger
			$bundles=Bundle::create([
				'title'=>$title,
				'description'=>$description,
                'amount'=>$amount,
				'user_id'=>$user_id, 
			]);
 
        DB::commit();
        
		if($bundles){
        Session::flash('message', 'Successfully created package');
        return Redirect::to('packages');
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
        $new=Bundle::find($id);
		
     	DB::beginTransaction();	
				 
		$new->delete();

		DB::commit();
		Session::flash('message', 'Successfully deleted the package');
        return Redirect::to('packages');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
		$package= Bundle::find($id);

        // show the edit form and pass the dozen
        return View('bundles.edit',compact('package'));
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
        $Bundle=Bundle::find($id);

        $Bundle->update($request->input());

        if($Bundle)
        {
            Session::flash('message', 'Successfully updated the package');
            return Redirect::to('packages');
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
        $new=Bundle::find($id);
		
     	DB::beginTransaction();	
				 
		$new->delete();

		DB::commit();
		Session::flash('message', 'Successfully deleted the package');
        return Redirect::to('packages');
    }

    //Function to read bundles
    public function readbundles(){
        
        $bundles=Bundle::orderBy('created_at','asc')->get();

        return view('bundles.Bundles_view',compact('packages'));
    }
}
