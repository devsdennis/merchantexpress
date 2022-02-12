<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Role;
use Session;
use Redirect;

class RoleController extends Controller {

protected  $rules = ['name' => ['required', 'min:4','unique:Roles'],
					'display_name' => ['required'],
					'description' => ['required'],	];
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
			//
        $roles = Role::get();
        return view('roles.index',compact('roles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('roles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	
	$this->validate($request, $this->rules);

	$owner = new Role();
	$owner->name         =  $request->input('name');
	$owner->display_name = $request->input('display_name');// optional
	$owner->description  = $request->input('description'); // optional
	$owner->save();
	
	if($owner)
	{
		Session::flash('message', 'Successfully created Profile');
        return Redirect::to('roles');
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
			// get the School
        $role = role::find($id);

        // show the edit form and pass the nerd
        return View('roles.edit',compact('role'));
             
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{

	  $rules = ['name' => ['required', 'min:3','unique:Roles,id,{$id}'],
					'display_name' => ['required','unique:Roles,id,{$id}'],
					'description' => ['required','unique:Roles,id,{$id}'],	];

	 $this->validate($request, $rules);

        $role = Role::find($id);
        $role->update($request->all());

        
        // redirect
        Session::flash('message', 'Successfully Updated Profile!');
        return Redirect::to('roles');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$role = role::find($id);
		$role->delete();
	 
		
		// if(count($role->perms))
		// 	{
		// 	Session::flash('message', 'Deletion Failed,Profile has associated permissions!');
	 //        return Redirect::to('roles');
		// 	}

		// 	else
		// 	{

	 //        $role->delete();

	        // redirect}
		
	        Session::flash('message', 'Successfully deleted the profile!');
	        return Redirect::to('roles');
		 

		}
		

}
