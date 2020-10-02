<?php

namespace App\Http\Controllers;
use App\price;
use Illuminate\Http\Request;
use Chartisan\PHP\Chartisan;
use App\order;

class ChartController extends Controller
{
    public function __construct()
    {
       $bil = order::all();

        view()->share('bil', $bil);
    }
    
    //

    public function getChartPrice($id)
    {
        // $date =[];
        // $pri =[];
        
    
  
    $price =price::where('product_id',$id)->get();
    // foreach($price as $pr)
    // {
    //     array_push($date,$pr['date_apply']);
    //     array_push($pri,$pr['price']);
    // }
        return $price;
    }
    public function getChartID()
    {
        return view("admin.chart.id");
    }
}
