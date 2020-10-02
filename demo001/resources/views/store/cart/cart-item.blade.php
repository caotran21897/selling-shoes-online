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