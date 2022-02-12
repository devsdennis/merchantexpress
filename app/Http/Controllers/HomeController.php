<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    

    $user=Auth::user();
    $user_id=$user->id;
    $news=Article::orderBy('created_at','Asc')->get();
     
    $user=Auth::user();
    
    $user_id=$user->id;
   
    if($user->cust_flag == 1){
        return view('cust_home',compact('news'));
    }else if($user->medic_flag ==1){
         
    $medic_id=$user->medic_id;
        
    return view('home',compact('news'));
         
    }else{
        return view('admin_home',compact('news'));
    }
        
    
    
	}//end of index file
}
