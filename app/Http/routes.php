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
Route::get('/', function () {
    return view('index');
	/**$posts = DB::table('cruiser_reports')
                ->join('users', function ($join){
                        $join->on('users.id', '=', 'cruiser_reports.author');
                })
                ->select('cruiser_reports.*','users.username as author_name')
                ->orderBy('updated_at', 'desc')
                ->skip(0)
                ->take(6)
                ->get();
    return view('layouts.index',['carouselItems' => $posts,'articles' => $posts]);**/
});


Route::get('/about', function () {
    return view('about');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/career', function () {
    return view('career');
});
Route::get('/cooperation', function () {
    return view('cooperation');
});
Route::get('/contact', function () {
    return view('contact');
});

//==pages=====================//

//Route::get('/cruiser_report/{id}', 'CruiserReportController@getPost');

Route::get('/home', function () {
    return redirect('/');
});
//==users=====================//
Route::get('/root',function(){
    	return view('layouts.loginPage');
    });
Route::get('/test',function(){
    	return view('root');
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