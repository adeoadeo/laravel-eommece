<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\form;

class HomeController extends Controller
{
   public function index(){
    
     return view('admin.index');
   }

   public function home(){
    $products =Product::all();
    if(Auth::id()){
      $user = Auth::user();
    $userId =  $user->id;
    
    $count = Cart::where('user_id',$userId)->count();
    }else{
      $count = '';
    }
    return view('home.index',compact('products','count'));
   }

   public  function login_home(){
    $products= Product::all();
    if(Auth::id()){
      $user = Auth::user();
    $userId =  $user->id;
    
    $count = Cart::where('user_id',$userId)->count();
    }else{
      $count = '';
    }
    return view('home.index',compact('products','count'));
   }

   public function product_details($id){
    $data = Product::find($id);
    if(Auth::id()){
      $user = Auth::user();
      $userId =  $user->id;
    
    $count = Cart::where('user_id',$userId)->count();
    }else{
      $count = '';
    }
    return view('home.product_details',compact('data','count'));
   }

   public function add_cart($id){
     $product_id = $id;
     $user = Auth::user();
     $user_id = $user->id;
     $data = new Cart();
     $data->user_id = $user_id;
     $data->product_id =  $product_id;

     $data-> save();
     toastr()->closeButton()->addSuccess('Cart added successfully');
     return redirect()->back();
   }

   public function myCart(){
    if(Auth::id()){
      $user = Auth::user();
    $userId =  $user->id;
    
    $count = Cart::where('user_id',$userId)->count();
    $cart = Cart::where('user_id', $userId)->get();
    }
    return view('home.cart',compact('count','cart'));
   }

   public function delete_cart($id){
       $data = Cart::find($id);
       $data->delete();
        toastr()->closeButton()->addSuccess('product Remove deleted form the Cart successfully');
        return redirect()->back();
   }

   public function confirm_order(Request $request){
    $name= $request->name;
    $address= $request->address;
    $phone= $request->phone;

    $user_id = Auth::user()->id;

    $cart = Cart::where('user_id',  $user_id )->get();

    foreach($cart as $carts ){
     $order = new Order();
     $order->name=  $name;
     $order->	rec_address= $address;
     $order->phone= $phone;
     $order->user_id= $user_id;
     $order->product_id=$carts->product_id;
     $order->save();
     

    }

    $cart_remove = Cart::where('user_id', $user_id )->get();
    foreach($cart_remove as $remove){
       $data = Cart::find($remove->id);
       $data->delete();
    }

    toastr()->closeButton()->addSuccess('product  Order successfully');
    return redirect()->back();
    

   }

  }