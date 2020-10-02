<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\brand;
use App\date;
use App\size;
use App\cart;
use App\productcolor;
use App\productdetail;
use App\salepromotion;
use DB;
use App\order;
use App\OrderStatus;
use App\orderdetail;
use sesstion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class StoreController extends Controller
{
    //
    public function __construct()
    {
        $now = Carbon::now();
        $sale = salepromotion::where([['begin','<=',$now],['end','>',$now]])->get();
        $brand = brand::all();
        $product = product::where('show',1)->get();
        $size =size::all();
        $new =product::where('show',1)->orderBy('id','DESC')->take(6)->get();
        
        // view()->share('slide', $slide);
        // view()->share('slide1', $slide1);
        view()->share('brand', $brand);
        view()->share('product', $product);
        view()->share('size', $size);  
        view()->share('sale', $sale);  
        view()->share('now', $now);  
        view()->share('new', $new);  
    }
    public function index()
    {
       
        
        return view('store.home.index');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $products = product::where('product_name', 'LIKE', '%' . $request->search . '%')->get();
            if ($products) {
                echo "gợi ý:";
                foreach ($products as $key => $product) {
                    $output .= '<li style="list-style-type:none">
                   
                    <a style="color:gray" href="store/product/detail/'.$product->id.'">' . $product->product_name . '</a>
                 
                    </li>';
                }
            }
            
            return Response($output);
        }
    }
    public function getsize($product_id,$color_id)
    {
        $pro_cl = productcolor::where([['product_id',$product_id],['color_id',$color_id]])->get();
        $product_color_id = $pro_cl[0]['id'];
        $detail = productdetail::where('product_color_id',$product_color_id)->get();
        $arr =array();
        foreach($detail as $size)
        {
          array_push($arr,$size['size_id']);

        }
        return $arr;
        
        // return $pro_cl;
        // return view('store.product.getsize',['pro_cl'=>$pro_cl]);
        // foreach($pro_cl->product_details as $pp)
        // {
            
        //          $pp->size->size;
            
        // }
    }

    public function getMen()
    {
        $men = product::where('style','<=',2)->get();
        return view('store.product.men',['men'=>$men]);
    }
    public function getWomen()
    {
        $women = product::where('style','>=',2)->get();
        return view('store.product.women',['women'=>$women]);
    }
    public function getAll()
    {
        return View('store.product.all');
    }
    public function contact()
    {
        return View('store.contact');
    }

    public function about()
    {
        return view('store.about');
    }

    public function getBrand($id)
    {
        
        $getBrand = product::where('brand_id',$id)->get();
       
        return View('store.brand.index',['getBrand'=>$getBrand]);
    }

    public function detail($id)
    {
        $product_detail = product::find($id);
        
        return view('store.product.detail',['pro_de'=>$product_detail]);
    }


    public function changeColor($color_id,$id)
    {
        
        $color= productcolor::where([
            ['color_id', '=', $color_id],
            ['product_id', '=', $id],
        ])->get();
        // return $color;
        return view('store.product.change-color',['color'=>$color]);
        
    }


    public function getquantity($id,$color,$size)
    {
        $pro_co =productcolor::where([['product_id',$id],['color_id',$color]])->get();
        $detail =productdetail::where([['product_color_id',$pro_co[0]['id']],['size_id',$size]])->get();
        
        // return $product_detail_id;
        // $detail = productdetail::find($product_detail_id);
        // // return $detail;
        return view('store.product.quantity',['detail'=>$detail]);
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
       return View('store.cart.cart-item');
       
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
        return View('store.cart.cart-item'); 
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
        return View('store.cart.listcart'); 
    }

    public function saveListItemCart(request $request,$id,$quantity)
    {
        $oldCart = session('Cart') ? session('Cart'): null;
        $newCart = new Cart($oldCart);
        $newCart->updateItemCart($id,$quantity);

        
        $request->session()->put('Cart',$newCart); 
        return View('store.cart.listcart');
    }

    public function checkout()
    {
        $newCart = new Cart(session('Cart'));
       
        $check = 0;
            foreach($newCart->products as $cart)
            {
                $productdetail =productdetail::find($cart['id_de']);
                if($productdetail->quantity < $cart['quantity'])
                $check =1;
            }
            if($check ==0)
                return view('store.cart.checkout');
            else
            {
                
                return redirect('list-cart')->with('thongbao','số lượng bạn nhập vược quá hạn');
            }
            
        
    }
    public function postCheckout(request $request)
    {
        $this->validate($request,[
            'address'=>'required',
            'phonenumber'=>'required',
            'name'=>'required',
        ],[
            'address.required'=>'Địa chỉ không được để trống',
            'phonenumber.required'=>'SDT không được để trống',
            'name.required'=>'Tên không được để trống',
        ]);
        $info = $request->name."_____".$request->phonenumber."_____".$request->address;
        $now = now();
        $check = date::where('date_time',$now)->exists();
        if(!$check)
        {
            $date = new date;
            $date->date_time = $now;
            $date->save();
        }
        

        $order = new order;
        $orderstatus = new OrderStatus;
        

        $order->user_id = Auth::user()->id;
        $order->date_buy = $now;
        $order->address_pay =$info;
        $order->payment = $request->payment;

        $order->save();

        $id = $order->max('id');

        $orderstatus->order_id = $id;
        $orderstatus->status_id = 1;
        $orderstatus->time_update = $now;
        $orderstatus->save();

        $newCart = new Cart(session('Cart'));
        if($request->session()->has('Cart'))
        {
            foreach($newCart->products as $arr)
            {
                $orderdetail = new orderdetail;

                $orderdetail->order_id =$id;
                $orderdetail->product_detail_id = $arr['id_de'];
                $orderdetail->quantity_buy=  $arr['quantity'];
               
                $orderdetail->save();

                $product_de = productdetail::find($arr['id_de']);
                $product_de->quantity -= $arr['quantity'];
                $product_de->save();
            }
        }
        if($request->session()->has('Cart'))
        $request->session()->forget('Cart');
        return redirect('list-cart')->with('thongbao','Đơn hàng được tạo thành công');

        

    }

    public function getChatBox()
    {
        return View('store.chatbox');
    }

    public function getCheckoutOnline($gd,$idpay,$mn,$up)
    {
        return view('store.cart.online',['gd'=>$gd,'idpay'=>$idpay,'mn'=>$mn,'up'=>$up]);
    }

    public function postCheckoutOnline(request $request)
    {
        $this->validate($request,[
            'address'=>'required',
            'phonenumber'=>'required',
            'name'=>'required',
        ],[
            'address.required'=>'Địa chỉ không được để trống',
            'phonenumber.required'=>'SDT không được để trống',
            'name.required'=>'Tên không được để trống',
        ]);
        $info = $request->name."_____".$request->phonenumber."_____".$request->address;
        $info_pay = $request->gd."_____".$request->idpay."_____".$request->mn."_____".$request->up;
        $now = now();
        $check = date::where('date_time',$now)->exists();
        if(!$check)
        {
            $date = new date;
            $date->date_time = $now;
            $date->save();
        }
        
        $order = new order;
        $orderstatus = new OrderStatus;
        

        $order->user_id = Auth::user()->id;
        $order->date_buy = $now;
        $order->address_pay =$info;
        $order->payment = 1;

        $order->save();

        $id = $order->max('id');

        $orderstatus->order_id = $id;
        $orderstatus->status_id = 1;
        $orderstatus->time_update = $now;
        $orderstatus->save();

        $newCart = new Cart(session('Cart'));
        if($request->session()->has('Cart'))
        {
            foreach($newCart->products as $arr)
            {
                $orderdetail = new orderdetail;

                $orderdetail->order_id =$id;
                $orderdetail->product_detail_id = $arr['id_de'];
                $orderdetail->quantity_buy=  $arr['quantity'];
               
                $orderdetail->save();

                $product_de = productdetail::find($arr['id_de']);
                $product_de->quantity -= $arr['quantity'];
                $product_de->save();
            }
        }
        DB::table('online_pays')->insert(
            ['info_pay' => $info_pay,'order_id' => $id]
        );
        
        if($request->session()->has('Cart'))
        $request->session()->forget('Cart');
        return redirect('list-cart')->with('thongbao','Đơn hàng được tạo thành công');



    }
}
