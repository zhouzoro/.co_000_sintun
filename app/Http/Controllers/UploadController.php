<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Log;

use App\admins;

use App\Pimgs;

class UploadController extends Controller
{
    public function getIndex(){
    	return 'upload index';
    }
    public function postFile(Request $request){
    	return $request;
    }
	public function postImg(Request $request){
		$file = $request->file('file') ? $request->file('file') : $request->file('image');
		$location =  self::saveFile($file,'images');
		Log::info($location);
		return response()->json(['location' => $location]);
	}

	public function newsImg($id, Request $request){
		$file = $request->file('file') ? $request->file('file') : $request->file('image');

		$dpath = base_path('wwwroot/images/news/' . $id);
		$extension = $file->getClientOriginalExtension(); // getting image extension
		$fileName = time().'_'.rand(0,99999).'.'.$extension;
		$file->move($dpath,$fileName);
		$location = '/images/news/'.$id.'/'.$fileName;
		
		Log::info($location);
		return response()->json(['location' => $location]);
	}

	public function carouselImg( Request $request){
		$admin = admins::where('name', $request->name)->where('password', $request->password)->count();
        if($admin==1){
			$file = $request->file('image');

			$dpath = base_path('wwwroot/images/carousel');
			$file->move($dpath,$request->fname);
			$location = '/images/carousel/'.$request->fname;
			
			Log::info($location);
			return response()->json(['location' => $location]);
		}else{
			return response()->redirect('/');
		}
	}
	public function saveFile($file, $ftype){
		if($file){
			$dpath = base_path('wwwroot/' . $ftype);
			$extension = $file->getClientOriginalExtension(); // getting image extension
			$fileName = time().'_'.rand(0,99999).'.'.$extension;
			$file->move($dpath,$fileName);
		    return	'/images/'.$fileName;
		}
	}
	public function posterImg( Request $request){
		$admin = admins::where('name', $request->name)->where('password', $request->password)->count();
        if($admin==1){
			$file = $request->file('image');

			$dpath = base_path('wwwroot/images/poster');
			$file->move($dpath,$request->fname);
			$location = '/images/poster/'.$request->fname;
			
			Log::info($location);
			return response()->json(['location' => $location]);
		}else{
			return response()->redirect('/');
		}
	}

	public function headerImg( Request $request){
		$admin = admins::where('name', $request->name)->where('password', $request->password)->count();
        if($admin==1){
			$file = $request->file('image');
			$dpath = base_path('wwwroot/images');
			$file->move($dpath,'hb.jpg');
			return 'done';
		}else{
			return response()->redirect('/');
		}
	}
	public function pImg($id, Request $request){
		$admin = admins::where('name', $request->name)->where('password', $request->password)->count();
		$dpath = base_path('wwwroot/images/products/'.$id);
		$file = $request->file('image');
        if($admin==1){
        	if($request->fname){
				$file->move($dpath,$request->fname);
				return 'done';
        	}
			$extension = $file->getClientOriginalExtension(); // getting image extension
			$fileName = time().'_'.rand(0,99999).'.'.$extension;

			$file->move($dpath,$fileName);

	        $newImg = new Pimgs;
			$newImg->pid = $id;
			$newImg->url = $fileName;
			$newImg->save();
			return response()->json(['fname' => $fileName, 'id' => $newImg->id, 'pid' => $id]);
		}else{
			return response()->redirect('/');
		}
	}
}
