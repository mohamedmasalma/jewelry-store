<?php

namespace App\Http\Controllers\admin\cat;
use App\cat;
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
        $cat=new cat;
        $deleted=$cat->where('deleted',1)->get();

       return view('admin.category.deleted',compact('deleted'));
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
    public function retrive(Request $request)
    {
        $cat=new cat;
        $c=$cat->find($request->id);
        foreach ($c->product as $key => $pro) {
            $pro->deleted=0;
            $pro->save();
        }
        $c->deleted=0;
        $c->save();
          session()->flash('added', 'category was retrived..!!!');
           return response()->json('ok'); 
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
