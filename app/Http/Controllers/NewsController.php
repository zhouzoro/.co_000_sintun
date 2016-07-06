<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = News::select('*')
                ->orderBy('updated_at', 'desc')
                ->skip(0)
                ->take(12)
                ->get();
        return view('news',['articles' => $articles, 'req' => $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPost = new News;
        $newPost->author = $request->input('author');
        $newPost->title = $request->input('title');
        $newPost->content = $request->input('content');
        $newPost->save();
        return response()->json(['status' => '200','msg' => 'success','url' => '/news/'.strval($newPost->id)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if(News::where('id', $id)->count()==1){

            $post = News::where('id', $id)->first();
            return view('article', ['post' => $post, 'req' => $request]);
        }else{
            return redirect('/');
        }
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
    
    public function redirectImages($imgname){
        return response()->file(base_path('wwwroot\\images\\'.$imgname));

    }
}
