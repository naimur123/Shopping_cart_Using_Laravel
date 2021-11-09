<?php

namespace App\Http\Controllers;
use App\Providers\app;
use App\Providers\cart;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\Idrequest;

use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use Session;
use File;



class AppController extends Controller
{
    public function home(){
     
        $products = app::all();
        return view('home')->with('products', $products);
    

    }
    public function add(Request $req){
       
    
        $check = cart::where('product_id',$req->product_id)->first();
        if($check){

        
          cart::where('product_id',$req->product_id)->increment('qty');
          $update = cart::where('product_id',$req->product_id)->value('qty');
          $updated_price = $req->price * $update;
          $cart= cart::where('product_id',$req->product_id)->value('id');
          $checkUpdate = cart::find($cart);
          if($checkUpdate)
          {

          $checkUpdate->updated_price =  $updated_price;
          $checkUpdate->save();
          
          }
          
          
          return redirect('/home');

        }
        else{
            $cart =new cart();
            $cart->product_id = $req->product_id;
            $cart->qty = 1;
            $cart->price = $req->price;
            $cart->updated_price = $req->price;
            $cart->product_img = $req->product_img;
            $cart->ip = request()->ip();
            $cart->save();
            return redirect('/home');
        }
    
       }
      static function item(){
        return cart::all()->sum('qty');
       }
       public function cart(){
         $details = cart::all();
         return view('cart')->with('details',$details);
       }
       public function update(Request $req){
       
    
        $check = cart::find($req->id);
        $check->qty = $req->qty;
        $check->updated_price = $req->qty * $req->price;
        $check->save();
        return redirect('/cart');
        
       }
       public function delete(Request $req){
       
       
        $check = cart::find($req->id);
        $check->delete();
        return redirect('/cart');
        
       }
       static function totalprice(){
        return cart::all()->sum('updated_price');
       }
       public function back(Request $req){
       
       
        $check= cart::where('ip',$req->ip)->delete();
        if($check)
        {
          return redirect('/home');
        }
        else{
          return redirect('/cart');
        }
      
       }
     

}