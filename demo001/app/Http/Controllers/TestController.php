<?php

namespace App\Http\Controllers;
use App\product;
use App\cart;
use App\brand;
use App\price;
use App\image;
use App\size;
use App\color;
use Carbon\Carbon;
use App\salepromotion;
use App\productdetail;
use App\productcolor;
use Illuminate\Http\Request;
use sesstion;


class TestController extends Controller
{
    public function __construct()
    {
        $now = Carbon::now();
        // $slide = product::orderBy('id','desc')->take(1)->get();
        // $slide1 = product::orderBy('id','desc')->skip(1)->take(2)->get();
        $sale = salepromotion::where([['begin','<=',$now],['end','>',$now]])->get();
        $brand = brand::all();
        $product = product::all();
        $size =size::all();
        // view()->share('slide', $slide);
        // view()->share('slide1', $slide1);
        view()->share('brand', $brand);
        view()->share('product', $product);
        view()->share('size', $size);  
        view()->share('sale', $sale);  
        view()->share('now', $now);  
    }
    public function index()
    {
        $pro = product::all();
        return View('index',['pro'=>$pro]);
    }

    public function addCart(request $request,$id,$color, $size, $qty)
    {
        $product = product::find($id);
        $pro_co =productcolor::where([['product_id',$id],['color_id',$color]])->get();
        $pro_de =productdetail::where([['product_color_id',$pro_co[0]['id']],['size_id',$size]])->get();
        $id_de =$pro_de[0]['id'];
        if ($pro_de != null) {
            $oldCart = session('Cart') ? session('Cart'): null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product,$id_de, $id,$color,$size,$qty);
            $request->session()->put('Cart',$newCart);
            
       } 
    //    return View('cart-item',compact('newCart'));
       return View('cart-item');
       
    }


    public function deleteItemCart(request $request,$id)
    {
        $oldCart = session('Cart') ? session('Cart'): null;
        $newCart = new Cart($oldCart);
        $newCart->deleteItemCart($id);

        if (count($newCart->products) >0) {
            $request->session()->put('Cart',$newCart);
        } else {
            $request->session()->forget('Cart');
        }
        // return View('cart-item',compact('newCart')); 
        return View('cart-item'); 
    }

    public function viewListCart()
    {
        return View('store.cart.list');
    }
    

    public function deleteListItemCart(request $request,$id)
    {
        $oldCart = session('Cart') ? session('Cart'): null;
        $newCart = new Cart($oldCart);
        $newCart->deleteItemCart($id);

        if (count($newCart->products) >0) {
            $request->session()->put('Cart',$newCart);
        } else {
            $request->session()->forget('Cart');
        }
        // return View('cart-item',compact('newCart')); 
        return View('listcart'); 
    }

    public function saveListItemCart(request $request,$id,$quantity)
    {
        $oldCart = session('Cart') ? session('Cart'): null;
        $newCart = new Cart($oldCart);
        $newCart->updateItemCart($id,$quantity);

        
        $request->session()->put('Cart',$newCart); 
        return View('listcart');
    }
}
