<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Auth;
use Session;
use Redirect;
use DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=Article::all();	 		 
		return view('news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('news.create');
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
         
        $user_id=Auth::user()->id;

        DB::beginTransaction();
	
			//Create the record of the account in the ledger
			$news=Article::create([
				'title'=>$title,
				'description'=>$description,
				'user_id'=>$user_id, 
			]);
 
        DB::commit();
        
		if($news){
        Session::flash('message', 'Successfully created news article');
        return Redirect::to('news');
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
        $new=Article::find($id);
		
     	DB::beginTransaction();	
				 
		$new->delete();

		DB::commit();
		Session::flash('message', 'Successfully deleted the article');
        return Redirect::to('news');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
		$new = Article::find($id);

        // show the edit form and pass the dozen
        return View('news.edit',compact('new'));
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
        $article=Article::find($id);

        $article->update($request->input());

        if($article)
        {
            Session::flash('message', 'Successfully updated the article');
            return Redirect::to('news');
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
        $new=Article::find($id);
		
     	DB::beginTransaction();	
				 
		$new->delete();

		DB::commit();
		Session::flash('message', 'Successfully deleted the article');
        return Redirect::to('news');
    }

    //Function to read news
    public function readnews(){
        
        $news=Article::orderBy('created_at','asc')->get();

        return view('news.articles_view',compact('news'));
    }
}
