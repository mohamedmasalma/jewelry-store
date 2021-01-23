<?php

namespace App\Http\Controllers\admin;

use App\product;
use App\cat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *s
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro=new product;
        
        $all=$pro->all();
      

     return view('admin.products.all',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $ca=new cat;
         $cat=$ca->all(); 
        return view('admin.products.add',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pro=new product;
        
        $pro->name=$request->pro_name;
        $pro->price=$request->pro_price;
        $pro->info=$request->pro_info;
        $pro->cat_id=$request->pro_cat;
        $pro->save();
        if($request->hasFile('mainImage')){
            $imgName='img'.$pro['id'].'.jpg';
         $request->mainImage->storeAs('public/main_imgs',$imgName);
        } 
        if($request->hasFile('infoImage')){
            $imgName='img'.$pro['id'].'.jpg';
         $request->mainImage->storeAs('public/info_imgs',$imgName);
        } 
        if($request->hasFile('smallImage')){
            $imgName='img'.$pro['id'].'.jpg';
         $request->mainImage->storeAs('public/info_imgs',$imgName);
        } 
        session()->flash('added', 'product was added..!!!');
        return redirect('admin/all/product');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $p=new product;
        $pro=$p->find($request->pro_id);
        $pro->cat_id=$request->change_cat;
        $pro->save();
         session()->flash('update', 'product was updated..!!!');
        return redirect('admin/all/cat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
