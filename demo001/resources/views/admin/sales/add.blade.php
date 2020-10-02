@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    
    
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
        <div class="row">
            <center><h2>Tạo đợt khuyến mãi</h2></center>
        </div>
        <hr>
        <div class="row">
            <select style="padding:5px 0;" name="" id="id_sp" >
                @foreach ($pro as $item)
                    <option value="{{ $item->id }}">{{ $item->product_name }}</option>
                @endforeach 
                
                
            </select> &emsp;
            <a class="btn btn-primary" href="javascript:" onclick="addsale(document.getElementById('id_sp').value)">Thêm sản phẩm vào đợt khuyến mãi</a>
        </div>
        
        <div id="sale113">
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
        </div>
        <hr>
        <div id="infosale">
            <form action="admin/salepromotions/add" method="post">
                @csrf
                <table>
                    <tr>
                        <td>Mức giảm giá: </td>
                        <td><input style="width:220px" type="number" min="0" max="100" name="discount" id="">%</td> 
                    </tr>
                    <tr >
                        <td>Chi tiết: </td>
                        <td>
                            <textarea style="margin-top: 5px" name="sale_detail" id="" cols="30" rows="3"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Ngày Bắt đầu khuyến mãi: </td>
                        <td><input type="datetime-local" value="" name="begin" id=""></td>
                        {{-- <td><input type="time" name="time" value="23:59:59" id=""></td> --}}
                       
                    </tr>
                    <tr>
                        <td>Ngày kết thúc khuyến mãi: </td>
                        <td><input style="margin-top: 5px" type="datetime-local" name="end" id=""></td>
                    </tr>
                    
                    <tr>
                        
                        <td colspan="2" ><input class="btn btn-primary btn-block " type="submit" value="Xác nhận thêm khuyễn mãi"></td>
                    </tr>
                </table>
                

            </form>
        </div>
        
    


</div>
@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
  
    <script>
        function addsale(id)
        {
            $.ajax({
                url: 'admin/salepromotions/add-sale/'+id,
                type: 'GET',
            }).done(function(data){
            
            $("#sale113").empty();
            $("#sale113").html(data);
            
            alertify.success('Đã thêm sản phẩm');
            
                
            });
        }

        function deleteListItemSale(id)
        {
            
            $.ajax({
                url: 'admin/salepromotions/del-sale/'+id,
                type: 'GET',
            }).done(function(data){
            
            $("#sale113").empty();
            $("#sale113").html(data);
            
            alertify.warning('Đã xóa sản phẩm');
            });
        }
    </script>
@endsection

