<?php

namespace App\Http\Controllers\admin\sold;

use App\product;
use App\cat;
use App\basket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class processController extends Controller
{
    /**
     * Display a listing of the resource.
     *s
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    $pro= new product;
    $all=$pro->all();
    $b=new basket;
     return view('admin.sold.process',compact("all"),compact("b"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
      $b=new basket;
      
      if(!empty($request->id[0])){

         $b=$b->find($request->id[0]);
         $b->product()->detach();
      }
      $b->date=$request->basket[0]["date"];
      $b->price=$request->basket[0]["price"];
      $b->number=$request->basket[0]["number"];
      $b->customer=$request->basket[0]["customer"];
      $b->save(); 
     //$b= $b->find(83);

      //$c= $b->product->find(1);
      //$c->pivot->price
      foreach ($request->product as $key => $value) {
           $b->product()->attach($value["id"],["number"=>$value["number"],"price"=>$value["price"]]);}
    
            return redirect("admin/sold");
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
       
    }
}
