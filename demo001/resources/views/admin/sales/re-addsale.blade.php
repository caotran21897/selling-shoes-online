@if (Session::has("Sale") != null)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th class="p-name">Product Name</th>
                            
                            <th>Delete</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        
                    
                            @foreach (Session::get("Sale")->products as $item)
                                <tr>
                                    
                                    <td class="cart-pic first-row">{{ $item['id'] }}</td>
                                    <td>{{ $item['productInfo']->product_name }}</td>
                                    
                                    <td ><a class="btn btn-danger" href="javascript:" onclick="deleteListItemSale({{ $item['id'] }})" >X</a></td>
                                    {{-- <td class="close-td first-row"><i onclick="saveListItemCart({{ $item['id_de'] }},document.getElementById('quantity-item-{{ $item['id_de'] }}').value)"  class="ti-save"></i></td> --}}
                                   
                                </tr>
                                
                            @endforeach
                    
                    </tbody>
                </table> 
                Tổng Sản phẩm: {{ Session::get("Sale")->num }}
            @else
                <center><h2>Chưa thêm khuyến mãi</h2></center>
            @endif