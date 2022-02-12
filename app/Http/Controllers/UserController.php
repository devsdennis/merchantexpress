<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\Ledger;
use App\Statement;
use App\Withdraw;
use Session;
use Redirect;
use App\Http\Middleware;
use App\Exceptions\CustomException;
use App\Http\Controllers\Exception;
use App\Payment;
use Log;

class UserController extends Controller {


    public function __construct()
    {
		$this->middleware('auth');
		$this->middleware('adminroutes');
      
    }


protected $rules=['first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'user_name' => 'required|max:255|unique:Users',
			'telephone' => 'required|max:12|min :9|unique:Users',
			'email' => 'required|max:255|unique:Users',
			'password' => 'required|confirmed|min:6'];
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		//named system_users to avoid conflict with the menu 'users ' name used
		$system_users = User::where('active',1)
							 ->orderBy('created_at','desc')->get();

		return view('users.index',compact('system_users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		//return view('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//		 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		 //
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$user = User::find($id);

		$update=array(
			'active'=>0,
			'verify'=>1
		);
		$user->update($update);

		Session::flash('message', 'Successfully deactivated user.');
		return redirect('users');
        
	
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{

		//rules
		$rules=['first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'user_name' => 'required|max:255|Unique:Users,id,{$id}',
			'telephone' => 'required|max:255|min :9|unique:Users,id,{$id}',
			'email' => 'required|max:255|unique:Users,id,{$id}'
			 ];
		

		//validation
		$this->validate($request, $rules);

		$active=$request->input('active');

		if($active== 'on'){
			$active=1;
		}
		else{
			$active=0;
		}
		
		$user_update=array(
			'first_name' => $request->input('first_name'),
			'last_name' => $request->input('last_name'),
			'user_name' => $request->input('user_name'),
			'telephone' => $request->input('telephone'),
			'email' => $request->input('email'),
			//'password' => bcrypt($request->input('password'))
		);


		 
		$user = User::find($id);

        $user->update($user_update);

         if($user)
        {

       	Session::flash('message', 'Successfully Updated User');
        return Redirect::to('users');
        }

        Session::flash('message','Failed to  update Record');
         return Redirect:: to('users');
		}
	

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		$user = User::find($id);
		 
		 
		if(count($user->vouchers))
		{
		
		Session::flash('message', 'User Has Asscociated Fee Entries/Deactivate User!');
        return Redirect::to('users');
		}

		if(count($user->slips))
		{

		Session::flash('message', 'User Has Asscociated Policy Entries/Deactivate User!');
        return Redirect::to('users');

		}

        $user->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the user!');
        return Redirect::to('users');
	}

	//function to reacivate user
	public function activate($id){
		 
		$user = User::find($id);

		$update=array(
			'active'=>1
		);
		$user->update($update);

		Session::flash('message', 'Successfully activated user.');
		return redirect('users');
	}//end of the activate function

	//Function to get inactive users
	public function inactive(){
	 
		//named system_users to avoid conflict with the menu 'users ' name used
		$system_users = User::where('active',0)
							->orderBy('created_at','desc')->get();

		return view('users.inactive_index',compact('system_users'));
	}

	

}
