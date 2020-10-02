<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\SalePromotion;
use session;
use App\order;
use DB;
use App\Sale;
use App\date;


class saleController extends Controller
{
    public function __construct()
    {
       $bil = order::all();

        view()->share('bil', $bil);
    }
    //sale_list
    public function getList()
    {
        $sale = SalePromotion::all();
        return View('admin.sales.list',['sale'=>$sale]);
    }

    //sale_add
    public function getAdd()
    {
        $p = product::all();
        
        return View('admin.sales.add',['pro'=>$p]);
    }

    public function postAdd(request $request)
    {
        $this->validate($request,[
            'discount'=>'required',
            'sale_detail'=>'required',
            'begin'=>'required',
            'end'=>'required',
        ],[
            'discount.required'=>'Chưa điền % giảm giá',
            'sale_detail.required'=>'Chưa điền chi tiết khuyến mãi',
            'begin.required'=>'Chưa điền thời gian bắt đầu khuyến mãi',
            'end.required'=>'Chưa điền thời gian kết thúc khuyến mãi',
        ]);
        
       
        $begin = $request->begin;
        $end = $request->end;
        $checkbegin = date::where('date_time',$begin)->exists();
        $checkend = date::where('date_time',$end)->exists();
        if(!$checkbegin)
        {
            $date = new date;
            $date->date_time = $begin;
            $date->save();
        }
        if(!$checkend)
        {
            $date = new date;
            $date->date_time = $end;
            $date->save();
        }
        
        

        $sale = new salepromotion;
        $sale->discount = $request->discount;
        $sale->sale_detail = $request->sale_detail;
        $sale->begin = $begin;
        $sale->end = $end;
        $sale->save();
        $id = $sale->max('id');

        
            
            
        

        $newSale = new Sale(session('Sale'));
        if($request->session()->has('Sale'))
        {

            
                foreach($newSale->products as $arr)
                {
                    DB::table('product_sale')->insert(
                        ['product_id' => $arr['id'],'sale_promotion_id' => $id]
                    );
                    
                }
            
        }
        if($request->session()->has('Sale'))
        $request->session()->forget('Sale');
        return redirect('admin/salepromotions/add')->with('thongbao','them thanh cong');

        
    } 

    //sale_edit

    public function getEdit($id)
    {
        $sale= SalesPromotion::find($id);
        return View('admin.sales.edit',['sale'=>$sale]);
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
        $sp = SalePromotion::find($id);
        $pro = product::all();
       
        return View('admin.sales.View',['sp'=>$sp, 'pro'=>$pro ]);
        
    }

    //add item
    public function addsales(request $request,$id)
    {
        $product = product::find($id);
        $Sale = session('Sale') ? session('Sale'): null;
        $newsale = new Sale($Sale);
        $newsale->addSale($product,$id);
        $request->session()->put('Sale',$newsale);
        return view('admin.sales.re-addsale');
    }

    public function delsales(request $request, $id)
    {
        $oldSale = session('Sale') ? session('Sale'): null;
        $newSale = new Sale($oldSale);
        $newSale->deleteItemSale($id);

        if (count($newSale->products) >0) {
            $request->session()->put('Sale',$newSale);
        } else {
            $request->session()->forget('Sale');
        }
        // return View('Receipt-item',compact('newReceipt')); 
        return view('admin.sales.re-addsale');
    }
}
