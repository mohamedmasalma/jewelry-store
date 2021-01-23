<?php

namespace App\Http\Controllers\admin\product;

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
        $c=new cat;
        
        $all=$pro->where('deleted','!=',1)->get();
         $cat=$c->where('deleted','!=',1)->get();
          $edit_pro=new product;
      

     return view('admin.products.all',compact('all'),compact('cat'));
    }

     public function index_edit(Request $request)
    {
        $pro=new product;
        $edit_pro=$pro->find($request->edit_id);
        $ca=new cat;
         $cat=$ca->all(); 
        return view('admin.products.add',compact('cat'),compact('edit_pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {    
        $edit_pro=new product;
        $ca=new cat;
        $cat=$ca->all(); 
        return view('admin.products.add',compact('cat'),compact('edit_pro'));
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

        $pro=new product;

        if (!empty($request->pro_to_edit)) {

            $pro=$pro->find($request->pro_to_edit);
        }
        
        $pro->name=$request->pro_name;
        $pro->t_price=$request->pro_t_price;
        $pro->k_price=$request->pro_k_price;
        $pro->min_price=$request->pro_ship_price;
        $pro->sell_price=$request->pro_sell_price;
        $pro->quantity=$request->pro_num;
        $pro->info=$request->pro_info;
        $pro->cat_id=$request->pro_cat;
        $pro->save();
        $imgName='img'.$pro['id'];
        if($request->hasFile('mainImage')){
            
         $request->mainImage->storeAs('public/main_imgs',$imgName.'.jpg');
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
        $p=new product;
        $pro=$p->find($request->pro_id);
        $pro->name=$request->pro_name;
        $pro->price=$request->pro_price;
        $pro->cat_id=$request->cat;
        $pro->info=$request->pro_info;
        $pro->save();

         session()->flash('update', 'product was updated..!!!');
        return redirect('admin/all/product');
        
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
    public function destroy(Request $request)
    {
        $p=new product;
        $pro=$p->find($request->pro_id);
        $pro->deleted=1;
        $pro->save();
         session()->flash('delete', 'product was deleted..!!!');
        return redirect('admin/all/product');
    }
}
