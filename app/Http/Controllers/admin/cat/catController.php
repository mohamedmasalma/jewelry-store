<?php

namespace App\Http\Controllers\admin\cat;

use App\cat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class catController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat=new cat;
        $all=$cat->where('deleted','!=',1)->get();
       return view('admin.category.all',compact('all')) ;
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
        $cat=new cat;
       $cat->name=$request->message;
       $cat->save();
        
         $response = array(
          'status' => 'success',
          'msg' => $cat,
      );
      return response()->json($response); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function show(cat $cat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
         if($request->hasFile('catImage')){ 
            
         $request->catImage->storeAs('public/cat_imgs','img'.$request->cat_id.'.jpg');
        } 
        if($request->cat_name =='')
       { 
        session()->flash('error', 'wrong category name..!!!');
        return redirect('admin/all/cat');
       }
        $cat= new cat;
       $c=$cat->find($request->cat_id);
       $c->name=$request->cat_name;
       $c->save(); 
        session()->flash('update', 'category was updated..!!!');
        return redirect('admin/all/cat');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
          $cat=new cat;
        $c=$cat->find($request->delete_cat_id);
        if($c->product->count()>0){
            
         session()->flash('delete', 'لا يمكن حذف هذا النوع لانه يحتوي على عناصر. انقل العناصر قبل  الحذف..!!!');
           return redirect("admin/all/cat"); 
       } 
      $c->delete();

         session()->flash('delete', 'تم  الحذف بنجاح!!!');
           return redirect("admin/all/cat");
    }
}
