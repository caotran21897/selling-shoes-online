<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\product;
use App\brand;
use App\size;
use App\User;
use App\Log;
use App\order;
class UserController extends Controller
{
    
    
    // public function __construct()
    // {
    //    $bill = order::all();

    //     view()->share('bill', $bill);
    // }
    public function __construct()
    {
        $slide = product::orderBy('id','desc')->take(1)->get();
        $slide1 = product::orderBy('id','desc')->skip(1)->take(2)->get();
        $brand = brand::all();
        $product = product::all();
        $size =size::all();
        $bil = order::all();

        view()->share('bil', $bil);
        view()->share('slide', $slide);
        view()->share('slide1', $slide1);
        view()->share('brand', $brand);
        view()->share('product', $product);
        view()->share('size', $size);
        
    }
    
    public function getLogin()
    {
        return view('Auth.login');
    }
    public function postLogin(request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:32',
        ],[
            'email.required'=>'chua dien mail',
            'password.required'=>'chua dien pass',
            'password.min'=>'mat khau tu 3 den 32 ki tu',
            'password.max'=>'mat khau tu 3 den 32 ki tu',
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        { 
                return redirect()->route('home');
                
        }
        else{
            return redirect()->route('login')->with('thongbao','dang nhap kh thanh cong');
        }
    }

    public function profile($id)
    {
        $user = user::find($id);
        return View('store.user.profile',['user'=>$user]);
    }




    public function getList(){
        $users = User::all();
        return View('admin.users.list',['users'=>$users]);
    }

    public function getAdd()
    {
        return View('admin.users.add');
    }
    public function postAdd(request $request)
    {
        $this->validate($request,[

        ],[

        ]);
        save();
    } 
    
    public function getEdit()
    {
        return View('admin.users.edit');
    }
    public function postEdit(request $request)
    {
        $this->validate($request,[

        ],[

        ]);
        save();
    }

    public function getLog($id)
    {
        $log = Log::where('user_id',$id)->get();
        
        return View('admin.users.log',['log'=>$log]);
    }

    public function getSigninAdmin()
    {
        return View('admin.login');
    }

    public function postSigninAdmin(request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:32',
        ],[
            'email.required'=>'chua dien mail',
            'password.required'=>'chua dien pass',
            'password.min'=>'mat khau tu 3 den 32 ki tu',
            'password.max'=>'mat khau tu 3 den 32 ki tu',
        ]);
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            if(Auth::user()->role == "admin")
                return redirect('admin/bills/list');
            else
            return redirect()->route('ad')->with('thongbao','ban phai dang nhap tai khoan admin');
        }
        else{
            return redirect()->route('ad')->with('thongbao','dang nhap kh thanh cong');
        }
    }
}
