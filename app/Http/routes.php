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
    $content = DB::table('pages')->where('name','about')->where('lang', $request->lang)->get()[0]->content;
    return view('about',['req' => $request, 'content' => $content]);
});

Route::get('/career', function (Request $request) {

    $content = DB::table('pages')->where('name','career')->where('lang', $request->lang)->get()[0]->content;
    return view('career',['req' => $request, 'content' => $content]);
});
Route::get('/collaboration', function (Request $request) {

    $content = DB::table('pages')->where('name','collaboration')->where('lang', $request->lang)->get()[0]->content;
    return view('collaboration',['req' => $request, 'content' => $content]);
});
Route::get('/contact', function (Request $request) {

    $content = DB::table('pages')->where('name','contact')->where('lang', $request->lang)->get()[0]->content;
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

Route::post('/root','UserController@login');


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
                            ->get();

            $ps = App\Products::select('*')
                            ->orderBy('id')
                            ->get();
            $about = DB::table('pages')->where('name','about')->where('lang', $request->lang)->get()[0]->content;
            $career = DB::table('pages')->where('name','career')->where('lang', $request->lang)->get()[0]->content;
            $collaboration = DB::table('pages')->where('name','collaboration')->where('lang', $request->lang)->get()[0]->content;
            $contact = DB::table('pages')->where('name','contact')->where('lang', $request->lang)->get()[0]->content;
            //add new temp post to get next column id
            $tempNews = New App\News;
            $tempNews->author = ' ';
            $tempNews->title = ' ';
            $tempNews->content = ' ';
            $tempNews->save();
            $newId = $tempNews->id;
            //check if previous id is used, if not, delete related directory
            $prevId = $newId - 1;
            $prevExsits = App\News::where('id',$prevId)->count();
            if($prevExsits != 1){
                File::deleteDirectory(base_path('wwwroot/images/news/'.$prevId));
            }
            //make new directory
            File::makeDirectory(base_path('wwwroot/images/news/'.$newId));
            //delete temp post, but id is taken to render view
            $tempNews->delete();

            $tempProducts = New App\Products;
            $tempProducts->name = ' ';
            $tempProducts->description = ' ';
            $tempProducts->save();
            $pId = $tempProducts->id;
            //check if previous id is used, if not, delete related directory
            $prevpId = $pId - 1;
            $prevExsits = App\Products::where('id',$prevpId)->count();
            if($prevExsits != 1){
                File::deleteDirectory(base_path('wwwroot/images/products/'.$prevpId));
            }
            //make new directory
            File::makeDirectory(base_path('wwwroot/images/products/'.$pId));
            $tempProducts->delete();


            $view = View::make('root',['req' => $request,'about' => $about,'career' => $career,'collaboration' => $collaboration,'contact' => $contact,'articles'=>$articles, 'newId'=>$newId, 'pId'=>$pId,'ps'=> $ps])->render();
            return response()->json(['status' => '200','msg' => 'Access Granted','html' => $view]);
        }else{
            return response()->json(['status' => '504','msg' => 'Admin Authentication Failed']);
        }
    });
Route::get('/new_product',function(Request $request){
    $tempProducts = New App\Products;
    $tempProducts->name = ' ';
    $tempProducts->description = ' ';
    $tempProducts->save();
    $newId = $tempProducts->id;
    //check if previous id is used, if not, delete related directory
    $prevId = $newId - 1;
    $prevExsits = App\Products::where('id',$prevId)->count();
    Log::info( $prevExsits);
    Log::info( $newId);
    Log::info( $prevId);
    if($prevExsits != 1){
        File::deleteDirectory(base_path('wwwroot/images/Products/'.$prevId));
    }
    //make new directory
    File::makeDirectory(base_path('wwwroot/images/Products/'.$newId));
    //delete temp post, but id is taken to render view
    $tempProducts->delete();
    $view = View::make('newProduct',['req' => $request, 'newId'=>$newId])->render();
    return response()->json(['status' => '200','msg' => 'Access Granted','html' => $view]);
});
Route::post('/upload/images','UploadController@postImg');

Route::post('/upload/images/news/{id}','UploadController@newsImg');

Route::post('/upload/images/carousel/','UploadController@carouselImg');
Route::post('/upload/images/poster','UploadController@posterImg');

Route::post('/upload/images/header','UploadController@headerImg');
Route::post('/upload/images/products/{id}','UploadController@pImg');

Route::post('/delete_imgs/{id}',function($id, Request $request){

        $admin = DB::table('admins')->where('name', $request->name)->where('password', $request->password)->count();
        if($admin==1){
            $dead = App\Pimgs::where('id', $id)->delete();
            File::delete(base_path('wwwroot/images/products/'.$id.'/'.$request->fname));
        }
    });

Route::get('/pimgs/{id}',function($id, Request $request){
        $pimgs = App\Pimgs::where('pid', $id)
                ->orderBy('id')
                ->get();
        return view('pimgs',['req' => $request, 'pimgs' => $pimgs]);
    });

Route::get('/edit_pimgs/{id}',function($id, Request $request){
        $pimgs = App\Pimgs::where('pid', $id)
                ->orderBy('id')
                ->get();
        $p = App\Products::where('id', $id)->first();
        return view('editPimgs',['req' => $request, 'pimgs' => $pimgs, 'pId' => $id, 'p' => $p ]);
    });
Route::get('/edit_pinfo/{id}',function($id, Request $request){
        $p = App\Products::where('id', $id)->first();
        return view('editPinfo',['req' => $request, 'p' => $p]);
    });
Route::resource('news','NewsController');

Route::resource('/products','ProductsController');

Route::post('/delete_news/{id}',function($id, Request $request){

        $admin = DB::table('admins')->where('name', $request->name)->where('password', $request->password)->count();
        if($admin==1){
            $dead = App\News::where('id', $id)->delete();
            File::deleteDirectory(base_path('wwwroot/images/news/'.$id));
        }
    });

Route::get('/edit_news/{id}',function($id, Request $request){
        $n = App\News::where('id', $id)->first();
        return view('editNews',['req' => $request, 'n' => $n]);
    });

Route::post('/delete_products/{id}',function($id, Request $request){

        $admin = DB::table('admins')->where('name', $request->name)->where('password', $request->password)->count();
        if($admin==1){
            $deadp = App\Pimgs::where('pid', $id)->delete();
            $dead = App\Products::where('id', $id)->delete();
            File::deleteDirectory(base_path('wwwroot/images/products/'.$id));
        }
    });

Route::post('/pages',function (Request $request){
    $Post = App\Page::where('name', $request->input('type'))->where('lang', $request->input('lang'))->first();
    Log::info($Post);
    $Post->content = $request->input('content');
    Log::info($request->input('content'));
    $Post->save();
    return response()->json(['status' => '200','msg' => 'success','url' => '/'.$request->input('lang').'/'.$Post->name]);
});
