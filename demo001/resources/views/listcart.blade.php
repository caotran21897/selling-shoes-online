<div class="cart-table">
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th class="p-name">Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @if (Session::has("Cart") != null)
                @foreach (Session::get("Cart")->products as $item)
                    <tr>
                        <td class="cart-pic first-row"><img width="100" src="{{ $item['productInfo']->images->first()->image }}" alt=""></td>
                        <td class="cart-title first-row">
                            <h5>{{ $item['productInfo']->product_name }}</h5>
                        </td>
                        <td class="p-price first-row">{{ number_format($item['productInfo']->prices->last()->price) }}₫</td>
                        <td class="qua-col first-row">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input id="quantity-item-{{ $item['productInfo']->id }}" type="text" value="{{ $item['quantity'] }}">
                                    
                                </div>
                            </div>
                        </td>
                        <td class="total-price first-row">{{ number_format($item['price']) }}₫</td>
                        <td class="close-td first-row"><i onclick="deleteListItemCart({{ $item['productInfo']->id }})" class="ti-close" ></i></td>
                        <td class="close-td first-row"><i onclick="saveListItemCart({{ $item['productInfo']->id }})" id="save-cart-item-{{ $item['productInfo']->id }}" class="ti-save"></i></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-lg-4 offset-lg-8">
        <div class="proceed-checkout">
            @if (Session::has("Cart") != null)
            <ul>
                <li class="subtotal">Subtotal <span>$0</span></li>
                <li class="cart-total">Total <span>{{ number_format(Session::get('Cart')->totalprice) }}₫</span></li>
            </ul>
            <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
            @endif
        </div>
    </div>
</div>