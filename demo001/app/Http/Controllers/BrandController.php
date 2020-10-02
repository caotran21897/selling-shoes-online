<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\order;

class BrandController extends Controller
{
    public function __construct()
    {
       $bil = order::all();

        view()->share('bil', $bil);
    }
    //brand_list
    public function getList()
    {
        $brand = Brand::all();
        return View('admin.brands.list',['brand'=>$brand]);
    }
    
    public function postAdd(request $request)
    {
      
        $this->validate($request,[
            'brand_name'=>'required|unique:Brands,brand_name|min:1|max:100',
        ],[
            'brand_name.required'=>'Bạn chưa điền tên thương hiệu !',
            'brand_name.unique'=>'Tên thương hiệu đã tồn tại !',
            'brand_name.min'=>'Tên thương hiệu có độ dài từ 1 đến 100 kí tự',
            'brand_name.max'=>'Tên thương hiệu có độ dài từ 1 đến 100 kí tự',
        ]);
        $brand = new Brand;
        $brand->brand_name =$request->brand_name;
        $brand->save();
        return redirect('admin/brands/list');
    }
 
    public function getEdit($id)
    {
        $brand = Brand::find($id);
        return View('admin.brands.edit',['brand'=>$brand]);
    }

    public function postEdit(request $request,$id)
    {
        $brand = Brand::find($id);
        $this->validate($request,[
            'brand_name'=>'required|unique:Brands,brand_name|min:1|max:100',
        ],[
            'brand_name.required'=>'Bạn chưa điền tên thương hiệu !',
            'brand_name.unique'=>'Tên thương hiệu đã tồn tại !',
            'brand_name.min'=>'Tên thương hiệu có độ dài từ 1 đến 100 kí tự',
            'brand_name.max'=>'Tên thương hiệu có độ dài từ 1 đến 100 kí tự',
        ]);
        
        $brand->brand_name =$request->brand_name;
        $brand->save();
        return redirect('admin/brands/list');
    }
}


