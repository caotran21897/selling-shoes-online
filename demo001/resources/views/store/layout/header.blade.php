<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    
                    <h4 style='font-family:"Comic Sans MS", cursive, sans-serif'>SHOES VIP</h4>
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                   <a style="color:rgb(68, 68, 255)" href="tel:0398859292"> Tel: 0398859292</a>
                </div>
            </div>
            <div class="ht-right">
                @if (Auth::check())
                    <a href="logout" class="login-panel"><i class="fa fa-sign-out"></i>Đăng xuất</a>
                @else
                    <a href="login" class="login-panel"><i class="fa fa-sign-in"></i>Đăng nhập</a>
                @endif
                
                <div class="lan-selector">
                    {{-- <select class="language_drop" name="countries" id="countries" style="width:300px;">
                        <option value='yt' data-image="img/flag-1.jpg" data-imagecss="flag yt"
                            data-title="English">English</option>
                        <option value='yu' data-image="img/flag-2.jpg" data-imagecss="flag yu"
                            data-title="Bangladesh">German </option>
                    </select> --}}
                </div>
                <div class="top-social">
                    @if (Auth::check())
                    <i class=" fa fa-envelope"></i> {{ auth::user()->email }}
                    <a href="#"><i class="fa fa-user"></i> <u>{{ auth::user()->name }}</u></a>
                    @else
                    {{ 'Tài Khoản Khách' }}
                    @endif
                    
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="#">
                            <img src="asset/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="advanced-search">
                        <button type="button" class="category-btn">&emsp;Tìm kiếm &emsp;   </button>
                        <form action="#" class="input-group">
                            <input type="text" id="search" placeholder="Nhập tên sản phẩm">
                            <button type="button"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div>  
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="heart-icon">
                            {{-- <a href="javascript:"> --}}
                                <i class="icon_heart_alt"></i>
                                {{-- <span>1</span> --}}
                            {{-- </a> --}}
                        </li>
                        <li class="cart-icon"><a href="list-cart">
                                <i class="icon_bag_alt"></i>
                                
                                     @if (Session::has("Cart") != null)
                                    <span id="total-quantity-show">{{ Session::get('Cart')->totalquantity}}</span>
                                    @else
                                    <span id="total-quantity-show">0</span>
                                    @endif
                                
                            </a>
                            <div id="change-item-cart" class="cart-hover">
                               
                                @if (Session::has("Cart") != null)
                                <?php $sum =0;?>
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                            @foreach (Session::get('Cart')->products as $item)
                                            
                                                <tr>
                                            
                                                        
                                                    <td style="width:30%" class="si-pic"><img width="70" src="{{ $item['productInfo']->product_colors->where('color_id', $item['color'] )->first()->images->first()->image }}" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            @if (count($sale)>0)
                                                                @foreach ($sale as $item_sale)<?php $check =0;?>
                                                                    @foreach ($item_sale->products as $goto)
                                                                    
                                                                        @if ($goto->id == $item['productInfo']->id)
                                                                            <?php $check =1;?>
                                                                        @endif
                                                                                                    
                                                                    @endforeach   
                                                                    @if ($check==1)
                                                                        
                                                                    <p>{{ number_format($item['productInfo']->prices->last()->price*(1-$item_sale->discount*0.01)) }}₫ x {{ $item['quantity'] }} {{ $item['productInfo']->product_colors->where('color_id',$item['color'])->first()->color->color_name }}.{{ $item['size'] }}</p>  
                                                                    <h6>{{ $item['productInfo']->product_name }}</h6>
                                                                    <?php $sum += 
                                                    ($item['price'] *(1-$item_sale->discount*0.01)) ?>
                                                                        
                                                                    @else
                                                                    <p>{{ number_format($item['productInfo']->prices->last()->price) }}₫ x {{ $item['quantity'] }} {{ $item['productInfo']->product_colors->where('color_id',$item['color'])->first()->color->color_name }}.{{ $item['size'] }}</p>  
                                                                    <h6>{{ $item['productInfo']->product_name }}</h6>
                                                                    <?php $sum +=
                                                    $item['price'];?>
                                                                    @endif 
                                                                @endforeach
                                                            @else
                                                            <p>{{ number_format($item['productInfo']->prices->last()->price) }}₫ x {{ $item['quantity'] }} {{ $item['productInfo']->product_colors->where('color_id',$item['color'])->first()->color->color_name }}.{{ $item['size'] }}</p>  
                                                            <h6>{{ $item['productInfo']->product_name }}</h6>
                                                            @endif
                                                            
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close" data-id="{{ $item['id_de'] }}"></i>
                                                    </td>
                                                    
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        @if (count($sale)>0)
                                        <h5>{{ number_format($sum) }}₫</h5>
                                        @else
                                        <h5>{{ number_format(Session::get("Cart")->totalprice) }}₫</h5>
                                        @endif
                                        {{-- <h5>{{ number_format(Session::get('Cart')->totalprice) }}₫</h5> --}}
                                        <input hidden id="total-quantity-Cart" type="number" value="{{ Session::get("Cart")->totalquantity }}" name="" id="">
                                    </div>
                                @endif
                                {{-- @if (Session::has("Cart") != null)
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                            @foreach (Session::get('Cart')->products as $item)
                                                <tr>
                                            
                                                        
                                                    <td style="width:30%" class="si-pic"><img width="70" src="{{ $item['productInfo']->product_colors->where('color_id', $item['color'] )->first()->images->first()->image }}" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>{{ number_format($item['productInfo']->prices->last()->price) }}₫ x {{ $item['quantity'] }} {{ $item['productInfo']->product_colors->where('color_id',$item['color'])->first()->color->color_name }}.{{ $item['size'] }}</p>  
                                                            <h6>{{ $item['productInfo']->product_name }}</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close" data-id="{{ $item['id_de'] }}"></i>
                                                    </td>
                                                    
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>{{ number_format(Session::get('Cart')->totalprice) }}₫</h5>
                                        <input hidden id="total-quantity-Cart" type="number" value="{{ Session::get("Cart")->totalquantity }}" name="" id="">
                                    </div>
                                @endif
                                 --}}
                                <div class="select-button">
                                    <a href="list-cart" class="primary-btn view-card">Xem Giỏ hàng</a>
                                    {{-- <a href="#" class="primary-btn checkout-btn">CHECK OUT</a> --}}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4"></div>
                <div id="show_search" style="width:250px"  class="col-lg-5">
                    
                </div>
            </div>
        </div>
    </div>
    <div  class="nav-item">
        <div id="navbar" class="container">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>Thương Hiệu</span>
                    <ul class="depart-hover">
                        @foreach ($brand as $item)
                            <li><a href="store/brand/{{ $item->id }}">{{ $item->brand_name }}</a></li>
                        @endforeach
                        
                    
                    </ul>
                </div>
            </div>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li><a href="home">Trang Chủ</a></li>
                    <li><a href="store/product/all">Cửa hàng</a></li>
                    <li><a href="store/product/men">Giày nam</a></li>
                    <li><a href="store/product/women">Giày nữ</a></li>
                    <li><a href="contact">Liên Hệ & Giới thiệu</a></li>
                    {{-- <li><a href="about">Giới Thiệu</a></li> --}}
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>