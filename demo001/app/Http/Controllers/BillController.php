<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\user;
use App\brand;
use App\orderstatus;
use App\orderdetail;
use App\Productdetail;
use App\product;
use App\status;
use App\date;
use DB;


class billController extends Controller
{
    public function __construct()
    {
       $bil = order::all();
       $stt = status::all();
    //    $bil = orderstatus::groupBy('status_id');
    //    $aa = $bil->last()->get();
       

        view()->share('bil', $bil);
        view()->share('stt', $stt);
    }
//bill_list
    public function getList()
    {
        $bill = order::all();
        
        
        return View('admin.bills.list',['bill'=>$bill]);

    }


    public function getEdit($id)
    {
        $bill =Bill::find($id);
        return View('admin.bills.edit',['bill'=>$bill]);
    }

    public function postEdit(request $request, $id)
    {
        $now = now();
        $check = date::where('date_time',$now)->exists();
        if(!$check)
        {
            $date = new date;
            $date->date_time = $now;
            $date->save();
        }
        $order_stt = new orderstatus;
        if($order_stt->where('order_id',$id)->max('status_id') < $request->tt){
       $order_stt->order_id =$id;
        $order_stt->status_id = $request->tt;
        $order_stt->time_update =$now;
        $order_stt->save();
        }
    
        
        return redirect('admin/bills/view/'.$id)->with('thongbao','them thanh cong');
    }

    public function getView($id)
    {
        $detail = orderdetail::where('order_id',$id)->get();
        return View('admin.bills.view',['detail'=>$detail]);
    }

    public function getChart()
    {
        return view('admin.chart.index');
    }
    public function getChartBrand($date)
    {   
        
        
        $temp =strtotime($date);
        
        $month= date('m',$temp);
        $year= date('Y',$temp);
        $brand = brand::all();
        $bill =order::whereYear('date_buy',$year)->whereMonth('date_buy',$month)->get();
    
        return view('admin.chart.brand',['bill'=>$bill,'brand'=>$brand,'month'=>$month,'year'=>$year]);
        
    }

    public function getChartAll($date)
    {
        $temp =strtotime($date);
        
        $month= date('m',$temp);
        $year= date('Y',$temp);
        
        $bill =order::whereYear('date_buy',$year)->whereMonth('date_buy',$month)->get();
    
        return view('admin.chart.all',['bill'=>$bill,'month'=>$month,'year'=>$year]);
    }
}

