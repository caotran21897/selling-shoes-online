<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goodsreceipt;
use App\Goodsreceiptdetail;
use App\Product_detail;
use App\product;
use App\productcolor;
use App\productdetail;
use App\color;
use App\receipt;
use App\supplier;
use sesstion;
use Carbon\Carbon;
use App\date;
use App\order;
use Illuminate\Support\Facades\Auth;


class goodsreceiptController extends Controller
{
    

    public function __construct()
    {
        $product = product::all();
        $Supplier =supplier::all();
      
           $bil = order::all();
    
            view()->share('bil', $bil);
       
        view()->share('product', $product);
        view()->share('supplier', $Supplier);
    }

    //goods_list
    public function getList()
    {
        $receipt = Goodsreceipt::all();
        return View('admin.goodsreceipts.list',['receipt'=>$receipt]);
    }

    //goods_add 

    public function getAdd()
    {
        return View('admin.goodsreceipts.add');
    }

    public function postAdd(request $request)
    {
        $this->validate($request,[
            'supplier'=>'required',
        ],[
            'supplier.required'=>'Chưa chọn nhà cung cấp !',
            
        ]);
        $now =now();
        $date =new date;
        $date->date_time =$now;
        $date->save();
        $goods = new goodsreceipt;
        $goods->supplier_id = $request->supplier;
        $goods->date_receipt = $now;
        $goods->save();
        $re = $goods->max('id');
        
        $newReceipt = new Receipt(session('Receipt'));
        if($request->session()->has('Receipt')){

          
            foreach($newReceipt->products as $arr)
            {
                $grd = new goodsreceiptdetail;

                $grd->goods_receipt_id =$re;
                $grd->product_detail_id = $arr['id_de'];
                $grd->quantity_receipt =  $arr['quantity'];
                $grd->price_receipt = $arr['pri'];
                $grd->save();

                $product_de = productdetail::find($arr['id_de']);
                $product_de->quantity += $arr['quantity'];
                $product_de->save();
            }
        }
        if($request->session()->has('Receipt'))
        $request->session()->forget('Receipt');
        return redirect('admin/goodsreceipts/add')->with('thongbao','them thanh cong');
        
        
       
    
    }

    //goods_edit

    public function getEdit($id){
        $goodsr =goodsreceipt::find($id);
        return View('admin.goodsreceipts.add',['goodsreceipt'=>$gr]);
    }

    public function postEdit(request $request,$id)
    {
        $this->validate($request,[

        ],[

        ]);
        save();
    }

    public function getView($id)
    {
        $gd = goodsreceiptdetail::where('goods_receipt_id','=',$id)->get();
        return View('admin.goodsreceipts.view',['gd'=>$gd, 'id'=>$id]);
    }


    public function addReceipt(request $request,$id,$color, $size, $qty, $pri)
    {
        
        $product = product::find($id);
        $pro_co =productcolor::where([['product_id',$id],['color_id',$color]])->get();
        $pro_de =productdetail::where([['product_color_id',$pro_co[0]['id']],['size_id',$size]])->get();
        $id_de =$pro_de[0]['id'];
        if ($pro_de != null) {
            $oldReceipt = session('Receipt') ? session('Receipt'): null;
            $newReceipt = new Receipt($oldReceipt);
            $newReceipt->addReceipt($product,$id_de, $id,$color,$size,$qty,$pri);
            $request->session()->put('Receipt',$newReceipt);
            
       } 
        
       return View('admin.goodsreceipts.re-add');
       
    }    

    public function deleteListItemReceipt(request $request,$id)
    {
        $oldReceipt = session('Receipt') ? session('Receipt'): null;
        $newReceipt = new Receipt($oldReceipt);
        $newReceipt->deleteItemReceipt($id);

        if (count($newReceipt->products) >0) {
            $request->session()->put('Receipt',$newReceipt);
        } else {
            $request->session()->forget('Receipt');
        }
        // return View('Receipt-item',compact('newReceipt')); 
        return View('admin.goodsreceipts.re-add'); 
    }

    // public function saveListItemCart(request $request,$id,$quantity,$pri)
    // {
    //     $oldReceipt = session('Cart') ? session('Cart'): null;
    //     $newReceipt = new Cart($oldReceipt);
    //     $newReceipt->updateItemCart($id,$quantity,$pri);

        
    //     $request->session()->put('Cart',$newReceipt); 
    //     return View('admin.goodsreceipts.add_up');
    // }

    public function getColor($id)
    {
        $color =productcolor::where('product_id',$id)->get();
        return view('admin.goodsreceipts.color',['color'=>$color]);
    }

    public function getSize($id,$color)
    {
        $pro_cl =productcolor::where([['product_id',$id],['color_id',$color]])->get();
        $detail =productdetail::where('product_color_id',$pro_cl[0]['id'])->get();
        return view('admin.goodsreceipts.size',['size'=>$detail]);
    }
}
