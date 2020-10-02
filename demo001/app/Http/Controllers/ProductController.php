<?php

namespace App\Http\Controllers;
use Illuminate\Suppost\Facedes\DB;
use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Color;
use App\Price;
use App\productdetail;
use App\Size;
use App\productcolor;
use App\order;
use App\date;
use App\image;
use App\supplier;

use App\Http\Requests\UploadRequest;


class productController extends Controller
{
    public function __construct()
    {
       $bil = order::all();
       $color_public = color::all();
       $size_public = size::all();
       $brand_public = brand::all();

        view()->share('bil', $bil);
        view()->share('color_public', $color_public);
        view()->share('size_public', $size_public);
        view()->share('brand_public', $brand_public);
    }
    //list
    public function getList()
    {
              
        $product = Product::all();

        return View('admin.products.list',['pro'=>$product]);
    }

    public function getView($id)
    {
        $pr= product::find($id);
        

        return View('admin.products.View',['pr'=>$pr]);
    }

//product_add
    public function getAdd()
    {
        $brand = brand::all();
        $color = color::all();
    
        return View('admin.products.add',['brand'=>$brand,'color'=>$color]);
    }
    

    public function postAdd(request $request)
    {
        $this->validate($request,
        [
            'product_name'=>'required|unique:products,product_name|min:1|max:100',
            'price'=>'required',
            'size'=>'required',
            
        ],[
            'product_name.required'=>'Tên sản phẩm chưa điền !',
            'product_name.unique'=>'Tên sản phẩm đã tồn tại',
            'product_name.min'=>'Tên sản phẩm có độ dài từ 1 đến 100 kí tự',
            'product_name.max'=>'Tên sản phẩm có độ dài từ 1 đến 100 kí tự',
            'size.required'=>'Bạn chưa chọn size',
       
           
        ]);
        $now = now();
        $check = date::where('date_time',$now)->exists();
        if(!$check)
        {
            $date = new date;
            $date->date_time = $now;
            $date->save();
        }
        $product = new Product;
        $price = new price;
        $product->product_name = $request->product_name;
        $product->brand_id = $request->brand;
        $product->show =1;
        $product->style = $request->style;
        $product->product_describe = $request->product_describe;
        $product->save();

        $id =$product->max('id');

        $price->product_id = $id;
        $price->price = $request->price;
        $price->date_apply = $now;
        $price->save();

        $color = new productcolor;
        $color->product_id = $id;
        $color->color_id = $request->color;
        $color->save();

        $pro_cl =$color->max('id');

        if ($request->hasFile('photos')) {
            $allowedfileExtension=['jpg','png'];
            $file = $request->photos;
            $exe_flg = true;
            foreach($file as $f)
            {   $file_name =$f->getClientOriginalName();
                $tontai = file_exists("upload/".$file_name);
                while($tontai)
                {
                    $file_name =rand()."_".$f->getClientOriginalName();
                    $check=in_array($file_name,$allowedfileExtension);
                    $tontai = file_exists("upload/".$file_name);
                    if(!$check) {
                        $exe_flg = false;
                        break;
                    }
                    if(!$tontai)
                    {
                        break;
                    }
                }
                // if($exe_flg) {
                $f->move('upload', $file_name);

                $img_color = new image;
                $img_color->product_color_id = $pro_cl;
                $img_color->image ="upload/".$file_name;
                $img_color->save();
                // }
                
            }
            
        }

        foreach($request->size as $sz)
        {
            $pro_de = new productdetail;
            $pro_de->product_color_id = $pro_cl;
            $pro_de->size_id = $sz;
            $pro_de->quantity =0;
            $pro_de->save();
        }
        return redirect('admin/products/view/'.$product->max('id'))->with('thongbao','them thanh cong');
       
    }

    public function updateinfo(request $request,$id)
    {
        $this->validate($request,
        [
            'product_name'=>'required|unique:products,product_name|min:1|max:100',
            
            
        ],[
            'product_name.required'=>'Tên sản phẩm chưa điền !',
            'product_name.unique'=>'Tên sản phẩm đã tồn tại',
            'product_name.min'=>'Tên sản phẩm có độ dài từ 1 đến 100 kí tự',
            'product_name.max'=>'Tên sản phẩm có độ dài từ 1 đến 100 kí tự',
            
           
        ]);
        $product = product::find($id);
        $product->product_name = $request->product_name;
        $product->brand_id = $request->brand;
      
        $product->style = $request->style;
        $product->save();
        return redirect('admin/products/view/'.$id)->with('thongbao','cập nhật thanh cong');
        
    }
    public function updateprice(request $request, $id)
    {
        $this->validate($request,
        [
            'price'=>'required', 
            
        ],[
            'price.required'=>'Chưa điền giá !', 
        ]);
        $check = price::where('product_id',$id)->get();
        $date = $check->max('date_apply');
        $pr = price::where([['product_id',$id],['date_apply',$date]])->select('price')->get();
        if($pr[0]['price'] == $request->price)
        {
            return redirect('admin/products/view/'.$id);
        }
        $now = now();
        $check = date::where('date_time',$now)->exists();
        if(!$check)
        {
            $date = new date;
            $date->date_time = $now;
            $date->save();
        }

        $price = new price;
        $price->product_id = $id;
        $price->price = $request->price;
        $price->date_apply = $now;
        $price->save();
        return redirect('admin/products/view/'.$id)->with('thongbao','cập nhật giá thanh cong');


        
    }

    public function addimgcolor(request $request, $id)
    {
        

        $color = new productcolor;
        $color->product_id = $id;
        $color->color_id = $request->color;
        $color->save();

        $pro_cl =$color->max('id');
        
        if ($request->hasFile('photos')) {
            $allowedfileExtension=['jpg','png'];
            $file = $request->photos;
            // $exe_flg = true;
            foreach($file as $f)
            {   $file_name =$f->getClientOriginalName();
                
                $tontai = file_exists("upload/".$file_name);
                while($tontai)
                {
                    $file_name =rand()."_".$f->getClientOriginalName();
                    $check=in_array($file_name,$allowedfileExtension);
                    $tontai = file_exists("upload/".$file_name);
                    if(!$check) {
                        $exe_flg = false;
                        break;
                    }
                    if(!$tontai)
                    {
                        break;
                    }
                }
                // echo $file_name;

                // if(!$exe_flg) {
                $f->move('upload', $file_name);

                $img_color = new image;
                $img_color->product_color_id = $pro_cl;
                $img_color->image ="upload/".$file_name;
                // echo "upload/".$file_name;
                $img_color->save();
                // }
                
            }
            
        }
        foreach($request->size as $sz)
        {
            $pro_de = new productdetail;
            $pro_de->product_color_id = $pro_cl;
            $pro_de->size_id = $sz;
            $pro_de->quantity =0;
            $pro_de->save();
        }
        return redirect('admin/products/view/'.$id)->with('thongbao','Thêm màu thanh cong');
       
    }
    public function addcolor($id)
    {
        $color= color:: all();
        $productcl = product::find($id);
        return view('admin.products.addcolor',['color'=>$color,'productcl'=>$productcl]);
    }

    public function postAddcolor(request $request,$id)
    {
        $this->validate($request,[
            'color'=>'unique:product_colors,color_id',
        ],[
            'color.unique'=>'mau nay da ton tai'
        ]);
        $pro_co = new productcolor;
        $pro_co->product_id = $request->id;
        $pro_co->color_id =$request->color;
        $pro_co->save();
        return redirect('admin/products/view/'.$id);
    }
//product_edit
    public function getEdit($id)
    {
        $producte = product::find($id);
        $brand = brand::all();
        
        return View('admin.products.edit',['pr'=>$producte,'brand'=>$brand]);
    } 


    public function postEdit(Request $request, $id)
    {
        $product = product::find($id);
        $this->validate($request,[

        ],[

        ]);
        $product = new product;

        $product->save();
    }

    public function postPrice(request $request,$id)
    {
        $this->validate($request,[
            'price'=>'required',
        ],[
            'price.required'=>'không được để trống',
        ]);
         $price = new price;
         $price->product_id = $request->id;
         $price->price = $request->price;
         $price->save();
         return redirect('admin/products/view/'.$id);
    }
        
    public function showtohide($id)
    {
        // echo $id;
        $product = product::find($id);
        $product->show = 0;
        $product->save();
        
        $pro = product::all();
        return view('admin.products.re-list',['pro'=>$pro]);
    }

    public function hidetoshow($id)
    {
       
        $product = product::find($id);
        $product->show = 1;
        $product->save();
        
        $pro = product::all();
        return view('admin.products.re-list',['pro'=>$pro]);
    }

    public function supplierList()
    {
        $sup = supplier::all();
        return view('admin.suppliers.list',['supplier'=>$sup]);
    }

    public function supplierAdd( request $request)
    {
        $this->validate($request,
        [
            'supplier_name'=>'required|unique:suppliers,supplier_name',
            'supplier_address'=>'required',
            'supplier_phone'=>'required|unique:suppliers,supplier_phone',
            
        ],[
            'supplier_name.required'=>'Tên sản phẩm chưa điền !',
            'supplier_name.unique'=>'Tên đã tồn tại',
            'supplier_address.required'=>'địa chỉ chưa điền',
            'supplier_phone.required'=>'chưa điền SDT',
            'supplier_phone.unique'=>'SDT đã tồn tại',
       
           
        ]);

        $sup = new supplier;
        $sup->supplier_name = $request->supplier_name;
        $sup->supplier_address = $request->supplier_address;
        $sup->supplier_phone =
         $request->supplier_phone;
        $sup->save();
        return redirect('admin/suppliers/list')->with('thongbao','Thêm nhà cung cấp mới thành công');
    }
    public function colorList()
    {
        $cl = color::all();
        return view('admin.colors.list',['color'=>$cl]);
    }

    public function colorAdd( request $request)
    {
        $this->validate($request,
        [
            'color_name'=>'required|unique:colors,color_name',
            'hex'=>'unique:colors,hex',
            
            
        ],[
            'color_name.required'=>'Tên màu chưa điền !',
            'color_name.unique'=>'Tên đã tồn tại',
            'hex.unique'=>' mã màu đã tồn tại',
            
       
           
        ]);

        $cl = new color;
        $cl->color_name = $request->color_name;
        $cl->hex = $request->hex;
        $cl->save();
        return redirect('admin/colors/list')->with('thongbao','Thêm màu mới thành công');
        
    }

}


