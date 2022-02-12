<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
 use App\Term;
use App\User;
use  View;
use Auth;
use Entrust;
use Session;
use Redirect;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class ActiveUserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$active_user=Auth::user()->id;

		$system_users=User::where('active','=','1')->get();

		$values = array($active_user);

		$system_users=User::whereNotIn('id', $values)
					->where('active','=','1')->get();

		return View('active_users.create',compact('system_users'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request  $request)
	{

		$users=$request->get('users');

		foreach ($users as $key => $value) {

			//$deactivate_users=array();
			
			$id=$value;
			$user=User::find($id);

			$deactive_user=$user->active;

			if($deactive_user = 0)
			{
				array_push($deactivate_users, $user);
			}
			else
			{

			$user_update=array(
			'active' => 0);

			$user->update($user_update);
			}

		
		}

		if($users)
		{
			Session::flash('message', 'Successfully Deactivated User');
	        return Redirect::to('users');
		}


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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
