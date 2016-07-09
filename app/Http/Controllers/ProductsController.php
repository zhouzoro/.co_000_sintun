<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Products;

use App\Pimgs;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Products::select('*')
                ->orderBy('id')
                ->get();
        foreach($products as $i => $p){
			$products[$i]->img = Pimgs::where('pid',$p->id)
								->orderBy('id')
								->first();
        }
        return view('products',['products' => $products, 'req' => $request]);
        
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
    	$p = Products::where('id', $request->input('id'))->first();
    	if($p){
	        $p->name = $request->input('name');
	        $p->description = $request->input('content');
	        $p->save();
	        return response()->json(['status' => '200','msg' => 'success','url' => '/products/'.strval($p->id)]);
    	}

        $newPost = new Products;
        $newPost->id = $request->input('id');
        $newPost->name = $request->input('name');
        $newPost->description = $request->input('content');
        $newPost->save();
        return response()->json(['status' => '200','msg' => 'success','url' => '/products/'.strval($newPost->id)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
