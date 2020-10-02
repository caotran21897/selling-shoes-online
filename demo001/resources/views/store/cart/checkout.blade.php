<link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="asset/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="asset/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="asset/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/slicknav.min.css" type="text/css">
    {{-- <link rel="stylesheet" href="asset/css/style.css" type="text/css"> --}}
<a class="btn btn-primary" href="list-cart"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
<div class="container-fluid">
   <center><h1>Xác Nhận Đơn Hàng</h1></center>
   <br>
        
    
    

    @if (Session::has("Cart") != null) <div class="row">
        <table align="center"  class="table">
            <thead>
                <tr>
                    <th>Mã sản phẩm</th>
                    <th class="p-name">Tên sản phẩm</th>
                    <th>Màu</th>
                    <th>Size</th>
                    <th>Giá gốc</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    
                    <th>Tạm tính</th>
                    
                </tr>
            </thead>
            <tbody>
                
                <?php $priced_sale =0;?>
                    @foreach (Session::get("Cart")->products as $item)
                        <tr>
                            
                            <td class="cart-pic first-row">{{ $item['id_de'] }}</td>
                            <td class="cart-title first-row">
                                <h5>{{ $item['productInfo']->product_name }}</h5>
                            </td>
                            <td class="cart-title first-row">
                            {{ $item['productInfo']->product_colors->where('color_id',$item['color'])->first()->color->color_name }}
                            </td>
                            
                        
                        
                            <td class="cart-title first-row">
                                {{ $item['size'] }}
                            </td>
                            <td class="p-price first-row">
                                @if (count($sale)>0)
                                    @foreach ($sale as $item_sale)<?php $check =0;?>
                                        @foreach ($item_sale->products as $goto)
                                        
                                            @if ($goto->id == $item['productInfo']->id)
                                                <?php $check =1;?>
                                            @endif
                                                                        
                                        @endforeach   
                                        @if ($check==1)
                                            
                                            <strike style="color:rgb(255, 166, 0))">{{ number_format( $item['productInfo']->prices->last()->price) }}₫</strike><br>
                                            
                                        @else
                                            {{ number_format( $item['productInfo']->prices->last()->price) }}₫
                                        @endif 
                                    @endforeach
                                @else
                                {{ number_format( $item['productInfo']->prices->last()->price) }}₫
                                @endif
                            </td>
                            <td class="p-price first-row">
                                @if (count($sale)>0)
                                    @foreach ($sale as $item_sale)<?php $check =0;?>
                                        @foreach ($item_sale->products as $goto)
                                        
                                            @if ($goto->id == $item['productInfo']->id)
                                                <?php $check =1;?>
                                            @endif
                                                                        
                                        @endforeach   
                                        @if ($check==1)
                                            
                                        {{ number_format( $item['productInfo']->prices->last()->price*(1-$item_sale->discount*0.01)) }}₫
                                        @else
                                        {{ '' }}
                                        @endif 
                                    @endforeach
                                @else
                                {{ '' }}
                                @endif
                            </td>
                            <td class="qua-col first-row">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        {{ $item['quantity'] }}
                                        
                                    </div>
                                </div>
                            </td>
                            
                            
                                
                            
                            <td class="total-price first-row">
                                @if (count($sale)>0)
                                    @foreach ($sale as $item_sale)<?php $check =0;?>
                                        @foreach ($item_sale->products as $goto)
                                        
                                            @if ($goto->id == $item['productInfo']->id)
                                                <?php $check =1;?>
                                            @endif
                                                                        
                                        @endforeach   
                                        @if ($check==1)
                                            
                                        {{ number_format($item['price'] *(1-$item_sale->discount*0.01)) }}₫
                                        @else
                                        {{ number_format($item['price']) }}₫
                                        @endif 
                                    @endforeach
                                    
                                @else
                                {{ number_format($item['price']) }}₫
                                @endif
                                
                                
                            </td>
                            @if (count($sale)>0)
                                    @foreach ($sale as $item_sale)<?php $check =0;?>
                                        @foreach ($item_sale->products as $goto)
                                        
                                            @if ($goto->id == $item['productInfo']->id)
                                                <?php $check =1;?>
                                            @endif
                                                                        
                                        @endforeach   
                                        @if ($check==1)
                                        <?php $priced_sale += 
                                        ($item['price'] *(1-$item_sale->discount*0.01)) ?>
                                        @else
                                        <?php $priced_sale +=
                                        $item['price'];?>
                                        @endif 
                                    @endforeach
                                    
                            
                                @endif
                        
                        </tr>
                        
                    @endforeach
            
            </tbody>
        </table> </div>
        <div class="row">
            <div class="col-md-9 col-ms-12">
   
            </div>
            <div  class="proceed-checkout col-md-3 col-ms-12">
                @if (Session::has("Cart") != null)

                @if (count($sale)>0)
                <ul style="border:1px solid black;list-style-type:none">
                    <li class="cart-total">Tổng tính <span>{{ number_format(Session::get('Cart')->totalprice) }}₫</span></li>
                    <li class="subtotal">Giảm giá <span>-{{ number_format(Session::get('Cart')->totalprice -$priced_sale) }}₫</span></li>
                    <li class="cart-total">Thành tiền <span>{{ number_format($priced_sale) }}₫</span></li>
                    <input type="hidden"  id="pay_money" value="{{ $priced_sale }}" name="">
                </ul>
                @else
                <ul>
                    <li class="cart-total">Tổng tính <span>{{ number_format(Session::get('Cart')->totalprice) }}₫</span></li>
                    <li class="subtotal">Giảm giá <span>-{{ "0" }}₫</span></li>
                    <li class="cart-total">Thành tiền <span>{{ number_format(Session::get('Cart')->totalprice) }}₫</span></li>
                    <input type="hidden"  id="pay_money" value="{{ Session::get('Cart')->totalprice }}" name="">
                </ul>
                @endif
                
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-ms-2"></div>
            <div class="col-md-8 col-ms-8">
                @if (count($errors) >0 )
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            {{ $err }} <br/>
                        @endforeach
                    </div>
                    
                @endif
                    
                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                    
                @endif
                <h4 style="text-transform:capitalize;"> Tài Khoản: {{ Auth::user()->name }}</h4>
                <input type="radio" onclick="getdata(this)" checked name="payment" value="0" id="">&nbsp;Shipper 
                <input type="radio" onclick="getdata(this)"  name="payment" value="1" id="">&nbsp;Online
                <script>
                    function getdata(a)
                    {
                        if(a.value==1)
                        {



                            
                            document.getElementById('dataform').innerHTML='<div id="paypal-button-container"></div>';
                            // '<form  action="checkout" method="post">@csrf <input style="margin-bottom:10px" type="hidden" value="1" name="payment"> <input style="margin-bottom:10px" size="80" type="text" name="address" id="" placeholder="Địa chỉ giao hàng"><br><input style="margin-bottom:10px" size="80" type="text" name="phonenumber" id="" placeholder="SDT liên hệ khi giao hàng"><br><input size="80" type="text" name="name" id=""  placeholder="Tên Khách Hàng"><br><input style="margin-top:10px" class="btn btn-primary" type="submit" value="Xác nhận thanh toán"></form>'
                            document.getElementById('lol').style.display ='block';
                            
                        }
                        else{
                           document.getElementById('dataform').innerHTML=
                           '<form  action="checkout" method="post">@csrf <input style="margin-bottom:10px" type="hidden" value="0" name="payment"> <input style="margin-bottom:10px" size="80" type="text" name="address" id="" placeholder="Địa chỉ giao hàng"><br><input style="margin-bottom:10px" size="80" type="text" name="phonenumber" id="" placeholder="SDT liên hệ khi giao hàng"><br><input size="80" type="text" name="name" id=""  placeholder="Tên Khách Hàng"><br><input style="margin-top:10px" class="btn btn-primary" type="submit" value="Xác nhận thanh toán"></form>'
                            document.getElementById('lol').style.display ='none';
                        }
                    }
                    
                   
                </script>
            
                <div id="dataform">
                    <form action="checkout" method="post">
                        @csrf
                        <input style="margin-bottom:10px" size="80" type="text" name="address" id="" placeholder="Địa chỉ giao hàng"><br>
                        <input style="margin-bottom:10px" size="80" type="text" name="phonenumber" id="" placeholder="SDT liên hệ khi giao hàng"><br>
                        <input style="margin-bottom:10px" size="80" type="text" name="name" id="" placeholder="Tên Khách Hàng"><br>
                        <input style="margin-top:10px" type="submit" class="btn btn-primary" value="Xác nhận thanh toán">
                        <input type="hidden" value="0" name="payment">
                    </form>
                </div>  
            </div>
            <div class="col-md-2 col-ms-2"></div>
        </div>
        <div class="row">
            <div id="caofromonline"></div>
        </div>


            <br>
        <div  class="row">
            <div class="col-md-4">
                
            </div>
                           
            <div style="display: none" id="lol" class="col-md-4">
                
                
                <script
                    src="https://www.paypal.com/sdk/js?client-id=AdWiQeh4EWqMHwKCgBcI4oqzJQoEskJiIS_k_p7EaKydxrbIoSnL1zuZop3iroxtinEQowE3Bv9JUe1v"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
                </script>
                <div id="paypal-button-container"></div>


                <script>
                    var pay_ment = document.getElementById('pay_money').value;
                    var money = pay_ment /23176
                    // alert(money)
                paypal.Buttons({
                    createOrder: function(data, actions) {
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                        purchase_units: [{
                        amount: {
                            value: money.toFixed(2)
                        }
                        }]
                    });
                    },
                    onApprove: function(data, actions) {
                    // This function captures the funds from the transaction.
                    return actions.order.capture().then(function(details) {
                        // This function shows a transaction success message to your buyer.
                        // alert(config('app.key'));
                    //    alert("Hello"+details['payer']['email_address']);
                    //    alert(details['update_time']);
                    //    alert(details['purchase_units'][0]['amount']['value'])
                    //    alert(details['payer']['payer_id'])
                    //    alert(details['payer']['email_address'])
                       console.log(details)
                       alert('Thanh toán thành công, hệ thống sẽ chuyển đến trang điền thông tin giao hàng ' );
                       window.location.href="checkout-online/"+details['id']+"/"+details['payer']['payer_id']+"/"+details['purchase_units'][0]['amount']['value']+"/"+details['update_time']
               
                    });
                    }
                }).render('#paypal-button-container');
                //This function displays Smart Payment Buttons on your web page.
                </script>
            </div>
            
            <div class="col-md-4">
                
            </div>
            
            
        </div>
        
    @endif
</div>