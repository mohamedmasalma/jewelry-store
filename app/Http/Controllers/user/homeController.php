<?php

namespace App\Http\Controllers\user;
use App\product;
use App\cat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
     public function index()
    {
       return view('user.home') ;
    }

      public function shop()
    {
    	$pro=new product;
    	$all=$pro->where('deleted','!=',1)->get();
       return view('user.shop',compact('all')) ;
    }

      public function shopList($id = null)
    {

     $pro=new product;
     $c=new cat;
      $cat=$c->where('deleted','!=',1)->get();
     if(is_null($id)){
     $all=$pro->where('deleted','!=',1)->get();
    }
    else{
    	 $all=$pro->where('cat_id','=',$id)->get();
    }
       return view('user.shop_list',compact('all'),compact('cat')) ;
    
    }

      public function portfolio()
    {
       return view('user.portfolio') ;
    }

     public function productDetails($id)
    {
    	 $p=new product;
       $c=new cat;
       $cat=$c->find($p->find($id)->cat['id']);
    	 $pro=$p->find($id);
       return view('user.product_details',compact('pro'),compact('cat')) ;
    }

      public function about()
    {
       return view('user.about') ;
    }

     public function contact()
    {
       return view('user.contact') ;
    }
}
