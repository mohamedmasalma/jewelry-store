<?php

namespace App\Http\Controllers\admin\sold;

use App\product;
use App\cat;
use App\basket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class soldcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *s
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $b=new product;
        $c=new basket;
        
        //$pro=$b->get();
         $bask=$c->get();
    

     return view('admin.sold.all',compact('bask'),compact('pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if($request->pro_cat==''){
            session()->flash('error', 'dont leave category empty!!!');
        return redirect('admin/create/product');
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
    public function edit(Request $request)
    {
       $b=new basket;
      $b=$b->find($request->edit_id);
        $pro= new product;
        $all=$pro->all();
       return view('admin.sold.process',compact("b"),compact("all"));
        
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $b = new basket;
       $b=$b->find($request->delete_id);
        $b->product()->detach();
       $b->delete();
       return redirect("admin/sold");

    }
}
