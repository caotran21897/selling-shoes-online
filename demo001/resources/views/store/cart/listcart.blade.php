<div class="col-lg-12" id="list-cart">
    <div class="cart-table">
        @if (Session::has("Cart") != null)
            <table class="table">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th class="p-name">Sản phẩm</th>
                        <th>Màu</th>
                        <th>size</th>
                        <th>Giá gốc</th>
                        <th>Khuyến mãi</th>
                        <th>Số lượng</th>
                        
                        <th>Tạm tính</th>
                        <th>Xóa</th>
                        <th>chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php $priced_sale =0;?>
                        @foreach (Session::get("Cart")->products as $item)
                            <tr>
                                
                                <td class="cart-pic first-row"><img width="100" src="{{ $item['productInfo']->product_colors->where('color_id',$item['color'])->first()->images[0]->image }}" alt=""></td>
                                <td style="width:200px !important" class="cart-title first-row">
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
                                            <input id="quantity-item-{{ $item['id_de'] }}" type="text" value="{{ $item['quantity'] }}">
                                            
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
                                <td class="close-td first-row"><i onclick="deleteListItemCart({{ $item['id_de'] }})" class="ti-close" ></i></td>
                                <td class="close-td first-row"><i onclick="saveListItemCart({{ $item['id_de'] }},document.getElementById('quantity-item-{{ $item['id_de'] }}').value)"  class="ti-save"></i></td>
                                
                            </tr>
                            
                        @endforeach
                
                </tbody>
            </table> 
        @else
            <center><h2>Giỏ hàng Trống</h2></center>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-4 offset-lg-8">
            <div class="proceed-checkout">
                @if (Session::has("Cart") != null)

                @if (count($sale)>0)
                <ul>
                    <li class="cart-total">Tổng tính <span>{{ number_format(Session::get('Cart')->totalprice) }}₫</span></li>
                    <li class="subtotal">Khuyến mãi <span>-{{ number_format(Session::get('Cart')->totalprice -$priced_sale) }}₫</span></li>
                    <li class="cart-total">Thành tiền <span>{{ number_format($priced_sale) }}₫</span></li>
                </ul>
                @else
                <ul>
                    <li class="cart-total">Tổng tính <span>{{ number_format(Session::get('Cart')->totalprice) }}₫</span></li>
                    <li class="subtotal">Khuyến mãi <span>-{{ "0" }}₫</span></li>
                    <li class="cart-total">Thành tiền <span>{{ number_format(Session::get('Cart')->totalprice) }}₫</span></li>
                </ul>
                @endif
                    @if (Auth::check())
                        <a href="checkout" class="proceed-btn">Xác nhận đơn hàng</a>
                    @else
                        <a class="proceed-btn" href="login">Xác Nhận đơn hàng</a>
                    @endif
                
                @endif
            </div>
        </div>
    </div>
</div>