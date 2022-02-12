<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use App\User;
use DB;


use Session;
use Redirect;

class PermissionController extends Controller {

public function __construct()
	{
		$this->middleware('auth');
        
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		


		$role_names=array();

		$permissions = DB::table('permissions')->get();

		foreach ($permissions as $permission)

		{

		$roles = Permission::find($permission->id)->roles;

		array_push($role_names, $roles);
		}



		 // foreach ($role_names as $key => $value) {
		 //  foreach ($value as $key => $val) {
		 //   echo $val->name;
		 //  }
		
		 // }

		//dd($role_names);
		 
 		return view('Permissions.index')
 		->with('permissions',$permissions)
 		->with('role_names',$role_names);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$roles = Role::lists('name','id');

		return view('Permissions.create',compact('roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

 
	$school=array();
	$term=$request->input('terms');
	$event=$request->input('events');
	$classes=$request->input('classes');
	$subjects=$request->input('subjects');

	array_push($school, $term);
	array_push($school, $event);
	array_push($school, $classes);
	array_push($school, $subjects);

	$permissions_array=array();
	$school_array=array();


	foreach ($school as $key => $value) {

		if (!$value == 0 && !$value ==null) {

			$permission_id=Permission::where('name','=',$value)->pluck('id');

			

			$permission=Permission::find($permission_id);

			

			array_push($school_array, $permission_id);

		
			//Roles in the database
			$role_id=$request->input('role_id');

			$role= new Role();

			$role= Role::find($role_id);
		 	
		 	//Number of permissions that the role has
		 	$permissions = Role::find($role->id)->permisssions;


		 	foreach ($permissions as $key => $permission_value) {

		 	array_push($permissions_array, $permission_value->id);


		 	// if(array_search($permission_value->id, $school))
			// if(($permission_value->id === $permission_id))
			
			// {
			// 	dd('eqaul');


			// }
			// else
			// {

			
			//  $permission=Permission::find($permission_id);
				 
			//  $role= new Role();

			//  $role= Role::find($role_id);

			//  $role->attachPermission($permission);
				 
			// }

			 }


			//dd($permissions_array);
		}
		 
		
	}
	$attach_permission=array_diff($school_array, $permissions_array);

	if(sizeof($attach_permission) > 0)
	{
		foreach ($attach_permission as $key => $permission_attach) {
		 
		    $permission=Permission::find($permission_id);
				 
			 $role= new Role();

			 $role= Role::find($role_id);

			 $role->attachPermission($permission);
	}
	
	}
	else
	{
		Session::flash('message', 'Profile has permission');
        return Redirect::to('permissions/create');

	}

dd('at');

	$permission = new Permission();
		$permission->name         = $request->input('name');
		$permission->display_name = $request->input('display_name'); // optional
		// Allow a user to...
 		$permission->save();

		//dd($permission->id);

	$role = Role::find($role_id);
	
	
	//$role_id->attachPermission($permission_name);
	//$role->perms()->sync([$permission->id], false);
	$role->attachPermission($permission);
	 
	//$owner->attachPermissions(array($createPost, $editUser));
	// equivalent to $owner->perms()->sync(array($createPost->id, $editUser->id));
	
	if($role)
	{
		   Session::flash('message', 'Successfully Added Permission');
        return Redirect::to('permissions/create');
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
		$roles = Role::lists('name','id');

		$permission = Permission::find($id);

		$role_id=4;

 		$role= new Role();

		$role= Role::find($role_id);
		//Number of permissions that the role has
		$permissions = Role::find($role->id)->permisssions;

		$role_name=$role->name;


		///dd($permissions->toArray());

        // show the edit form and pass the nerd
        return View('permissions.edit',compact('role','permission','permissions','role_name'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		$permissions_array=array();

		$role_id=$request->input('role_id');

		$role= new Role();

		$role= Role::find($role_id);

		//Number of permissions that the role has
		$permissions = Role::find($role->id)->permisssions;

		foreach ($permissions as $key => $value) {
			array_push($permissions_array, $value->name);
		}


		$input=$request->except('_method','_token','role_id');

		$input_array=array();
		$input_array2=array();

		foreach ($input as $key => $value) {

			if (!$value == 0 && !$value ==null) {

			array_push($input_array, $value);
			}
			else
			{
				array_push($input_array2, $value);

			}

		}

		dd($input_array2);

		$attach_permission=array_diff($input_array, $permissions_array);

		$remove_permission=array_diff($permissions_array, $input_array2);

		dd($remove_permission);


		//$subject = new Subject();
        // $permission = Permission::find($id);
        // $permission->update($request->all());

        
        // redirect
        Session::flash('message', 'Successfully Updated Permission!');
        return Redirect::to('permissions');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$permission = Permission::find($id);
		$permission->delete();
		
        // redirect
        Session::flash('message', 'Successfully deleted the Permission!');
        return Redirect::to('permissions');
	   
	}

}
