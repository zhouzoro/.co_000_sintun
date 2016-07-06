<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Http\Request;


//==tests=====================//

Route::controller('test','test');

//Route::controller('upload','UploadController');

Route::get('/upload/files',function(){
        return view('upload_test');
    });

//Route::resource('cruiser_report','CruiserReportController');

//==pages=====================//
Route::get('/', function (Request $request) {
	/*$articles = DB::table('news')
                ->select('*')
                ->orderBy('updated_at', 'desc')
                ->skip(0)
                ->take(6)
                ->get();'articles' => $articles, */
    return view('index',['req' => $request]);
});


Route::get('/about', function (Request $request) {
    $content = DB::table('pages')->where('name','about')->where('lang', 'zh')->get()[0]->content;
    return view('about',['req' => $request, 'content' => $content]);
});

Route::get('/products', function (Request $request) {
    return view('products',['req' => $request]);
});

Route::get('/career', function (Request $request) {

    $content = DB::table('pages')->where('name','career')->where('lang', 'zh')->get()[0]->content;
    return view('career',['req' => $request, 'content' => $content]);
});
Route::get('/collaboration', function (Request $request) {

    $content = DB::table('pages')->where('name','collaboration')->where('lang', 'zh')->get()[0]->content;
    return view('collaboration',['req' => $request, 'content' => $content]);
});
Route::get('/contact', function (Request $request) {

    $content = DB::table('pages')->where('name','contact')->where('lang', 'zh')->get()[0]->content;
    return view('contact',['req' => $request, 'content' => $content]);
});

//==pages=====================//

//Route::get('/cruiser_report/{id}', 'CruiserReportController@getPost');

Route::get('/home', function () {
    return redirect('/');
});
//==users=====================//
Route::get('/root',function(Request $request){
    	return view('layouts.loginPage',['req' => $request]);
    });
Route::get('/test',function(Request $request){
        $articles = App\News::select('*')
                        ->orderBy('updated_at', 'desc')
                        ->skip(0)
                        ->take(12)
                        ->get();
        $about = DB::table('pages')->where('name','about')->where('lang', 'zh')->get()[0]->content;
        $career = DB::table('pages')->where('name','career')->where('lang', 'zh')->get()[0]->content;
        $collaboration = DB::table('pages')->where('name','collaboration')->where('lang', 'zh')->get()[0]->content;
        $contact = DB::table('pages')->where('name','contact')->where('lang', 'zh')->get()[0]->content;
    	return view('root',['req' => $request,'about' => $about,'career' => $career,'collaboration' => $collaboration,'contact' => $contact,'articles'=>$articles]);
    });

Route::post('/root','UserController@login');

Route::post('/delete_news/{id}',function($id, Request $request){

        $admin = DB::table('admins')->where('name', $request->name)->where('password', $request->password)->count();
        if($admin==1){
            $dead = App\News::where('id', $id)->delete();
        }
    });

Route::post('/update_pass',function(Request $request){

        $adminCount = App\admins::where('name', $request->name)->where('password', $request->password)->count();
        Log::info($request->name);
        Log::info($request->oldpassword);
        if($adminCount==1){
            Log::info($adminCount);
            if($request->password == $request->oldpassword){
                $admin = App\admins::where('name', $request->name)->where('password', $request->password)->first();
                $admin->password = $request->newpassword;
                $admin->save();
                return response()->json(['status' => '200','url' => '/root']);

            }else{
                return response()->json(['status' => '504','msg' => "Something's wrong"]);
            }
        }else{
            return response()->json(['status' => '504','msg' => "Something's wrong"]);
        }
    });
Route::post('/login',function(Request $request){
        $admin = App\admins::where('name', $request->name)->where('password', $request->password)->count();
        if($admin==1){
            $articles = App\News::select('*')
                            ->orderBy('updated_at', 'desc')
                            ->skip(0)
                            ->take(12)
                            ->get();
            $about = DB::table('pages')->where('name','about')->where('lang', 'zh')->get()[0]->content;
            $career = DB::table('pages')->where('name','career')->where('lang', 'zh')->get()[0]->content;
            $collaboration = DB::table('pages')->where('name','collaboration')->where('lang', 'zh')->get()[0]->content;
            $contact = DB::table('pages')->where('name','contact')->where('lang', 'zh')->get()[0]->content;

            $view = View::make('root',['req' => $request,'about' => $about,'career' => $career,'collaboration' => $collaboration,'contact' => $contact,'articles'=>$articles])->render();

            return response()->json(['status' => '200','msg' => 'Access Granted','html' => $view]);
        }else{
            return response()->json(['status' => '504','msg' => 'Admin Authentication Failed']);
        }
    });

Route::post('/upload/images','UploadController@postImg');

Route::resource('news','NewsController');

Route::post('/pages',function (Request $request){
    $Post = App\Page::where('name', $request->input('type'))->where('lang', $request->lang)->first();
    Log::info($Post);
    $Post->content = $request->input('content');
    Log::info($request->input('content'));
    $Post->save();
    return response()->json(['status' => '200','msg' => 'success','url' => '/'.$Post->name]);
});
