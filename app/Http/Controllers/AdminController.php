<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request){

        $category = new Category();
        $category->category_name = $request->category;
        $category ->save();
        toastr()->closeButton()->addSuccess('Category added successfully');
        return redirect()->back();
    }

    public function delete_category($id){

        $data =  Category::find($id);
        $data->delete();
        toastr()->closeButton()->addSuccess('Category delete successfully');

        return redirect()->back();

    }

    public function edit_category_view ($id){
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));
    }


    public function  update_category(Request $request,$id){

        $data = Category::find($id);
        $data->category_name=$request->category;
        $data->save();
        toastr()->closeButton()->addSuccess('Category update successfully');
        return redirect('view_category');

    }

    public function add_product_view(){
        $category = Category::all();
        return view('admin.add_product',compact('category'));
    }

    public function upload_product(Request $request){
        $data = new Product();
        $data->title =$request->title;
        $data->description=$request->description;
        $data->price =$request->price;
        $data->category =$request->category;
        $data->quantity =$request->quantity;

       $image =$request->image;
       if($image){
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('products', $imageName);
        $data->image =  $imageName;
       }

       
        $data->save();
        toastr()->closeButton()->addSuccess('Product addede successfully');
        return redirect()->back();
    }

    public function view_product(){
        $products = Product::paginate(2);
        return view('admin.product_view',compact('products'));
    }

    public function delete_product($id){

        $data = Product::find($id);
        $image_path = public_path('products/'.$data->image);
        if(file_exists($image_path)){
            unlink($image_path);

        }
        $data->delete();
        toastr()->closeButton()->addSuccess('Product deleted successfully');
        return redirect()->back();
    }

    public function update_product(Request $request,$id){
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.update_product',compact('data','category'));


    }


    public function edit_product(Request $request,$id){

       $data = Product::find($id);
       $data->title = $request->title;
       $data->description = $request->description;
       $data->price = $request->price;
       $data->category = $request->category;
       $data->title = $request->title;
       $image = $request->image;
       if( $image){
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('products', $imageName);
        $data->image =  $imageName;
       }

       $data->save();
       
       toastr()->closeButton()->addSuccess('Product Update successfully');
       return redirect('view_product');
    }

    public function  product_search(Request $request){
        $search = $request->search;
        $products= Product::where('title','LIKE','%'.$search.'%')->paginate(3);
        return view('admin.product_view',compact('products'));

    }

    public function view_order(){
        $data = Order::all();
        return view('admin.order',compact('data'));
    }

    public function on_the_way($id){
        $data =Order::find($id);
        $data->status = 'In the way';
        $data->save();
        return redirect('/view_order');
    }

    public function delivered($id){
        $data =Order::find($id);
        $data->status = 'delivered';
        $data->save();
        return redirect('/view_order');
    }

}
