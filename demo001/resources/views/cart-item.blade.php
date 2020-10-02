
@if (Session::has("Cart") != null)
<div class="select-items">
    <table>
        <tbody>
           @foreach (Session::get('Cart')->products as $item)
            <tr>
               
                    
                <td class="si-pic"><img width="70" src="{{ $item['productInfo']->images->first()->image }}" alt=""></td>
                <td class="si-text">
                    <div class="product-selected">
                        <p>{{ number_format($item['productInfo']->prices->last()->price) }}₫ x {{ $item['quantity'] }}</p>
                        <h6>{{ $item['productInfo']->product_name }}</h6>
                    </div>
                </td>
                <td class="si-close">
                    <i class="ti-close" data-id="{{ $item['productInfo']->id }}"></i>
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