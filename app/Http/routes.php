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
	$articles = DB::table('news')
                ->select('*')
                ->orderBy('updated_at', 'desc')
                ->skip(0)
                ->take(6)
                ->get();
    return view('index',['articles' => $articles, 'req' => $request]);
});


Route::get('/about', function (Request $request) {
    return view('about',['req' => $request]);
});

Route::get('/products', function (Request $request) {
    return view('products',['req' => $request]);
});

Route::get('/career', function (Request $request) {
    return view('career',['req' => $request]);
});
Route::get('/cooperation', function (Request $request) {
    return view('cooperation',['req' => $request]);
});
Route::get('/contact', function (Request $request) {
    return view('contact',['req' => $request]);
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
    	return view('root',['req' => $request]);
    });

Route::post('/root','UserController@login');

Route::post('/upload/images','UploadController@postImg');

Route::resource('news','NewsController');

Route::post('/update_page',function (Request $request){
    $html = $request->input('html');
    $ftype = $request->input('type');
    File::put(base_path('wwwroot/' . $ftype),$html);
    return response()->json(['status' => 200]);
});