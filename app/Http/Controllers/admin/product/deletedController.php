<?php

namespace App\Http\Controllers\admin\product;
use App\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class deletedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro=new product;
        $all=$pro->where('deleted','!=',0)->get();
        return view('admin.products.deleted',compact('all'));
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
        //
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
    public function update(Request $request)
    {
         $c=new product;
         $pro=$c->find($request->id);
            $pro->deleted=0;
            $pro->cat_id=1;
            $pro->save();

          session()->flash('success', 'product was retrived to general category..!!!');
           return response()->json('ok'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pro=new product;
        $pro=$pro->find($request->final_delete_id);
        $pro->delete();
         session()->flash('error', 'لقد تم حذف العنصر نهائيا..!!!');
          return redirect('/admin/deleted/pro');
        
    }
}
