<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use Session;
use Redirect;
use App\Http\Middleware;
use AuthenticatesAndRegistersUsers;



use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PasswordResetController extends Controller {

    protected $passwords;

    protected $auth;
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$user=Auth::user();
	
		return view('auth.reset',compact('user'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
 //        $this->validate($request, [
 //            'user_name' => 'required',
 //            'password' => 'required|confirmed',
 //        ]);
         $this->validate($request,[
         	'first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'user_name' => 'required|max:255',
			'telephone' => 'required|max:255|min :9',
			'email' => 'required|max:255',
			'password' => 'required|confirmed|min:6']);

        $user=Auth::user();
        $email=$user->email;
        $user_id=$user->id;

        

        $user_update=array(
			'first_name' => $request->input('first_name'),
			'last_name' => $request->input('last_name'),
			'user_name' => $request->input('user_name'),
			'telephone' => $request->input('telephone'),
			'email' => $request->input('email'),
			'password' => bcrypt($request->input('password'))
		);



		 
		$user = User::find($user_id);

        $user->update($user_update);


        if($user)
        {

       	Session::flash('message', 'Successfully Updated Your Details');
        return Redirect::to('auth/logout');
        }

        Session::flash('message','Failed to  update Record');
         return Redirect:: to('users');
		}



		// if (!Auth::validate($credentials))
		// {
		 
		// Session::flash('message', 'Your credentials Failed/Try Again');
  //       return Redirect::to('reset/password');
		// }

  //       $credentials = $request->only(
  //           'user_name', 'password', 'password_confirmation'
  //       );

         
         
       

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
