@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        {{-- <div class="row">
            <!-- ValutaFX CURRENCY CONVERTER START -->
            <div style='width:100%;*width:250px;max-width:250px;margin:0px auto;padding:0px;border:1px solid #01698C;background-color:#FFFFFF;'>
                <div style='width:100%;*width:250px;max-width:250px;text-align:center;padding:10px 0px;background-color:#01698C;font-family:arial;font-size:16px;color:#FFFFFF;font-weight:bold;vertical-align:middle;'>Công cụ chuyển đổi tiền tệ</div>
                <div style='padding:10px;'>
                <script type='text/javascript' charset='utf-8'>if(typeof vfxIdx==='undefined')vfxIdx=0;vfxIdx++;document.write("<div id='vfxWidget"+vfxIdx+"'><"+"/div>");document.write("<script async type='text/javascript' src='https://widgets.valutafx.com/ConverterWidgetLoader.aspx?sid=CC00BQ8CD&idx="+vfxIdx+"' charset='utf-8'></" + "script>");</script>
                <div style='overflow: hidden;'>
                <div style='float:left; text-align: left;'><noindex><a title='Thêm widget miễn phí này vào trang web của bạn!' style='font-size:12px;color:#007EAA;text-decoration: none;' href='https://vn.valutafx.com/AddConverter.aspx?sid=CC00BQ8CD' target='_blank' rel='nofollow'>Thêm vào trang web</a></noindex></div>
                <div style='float:right; text-align: right;'><a style='font-size:12px;color:#777777;text-decoration: none;opacity: 0.6;filter: alpha(opacity=60);' href='https://vn.valutafx.com/' target='_blank'>vn.valutafx.com</a></div></div>         
                </div>
                </div>
                <!-- ValutaFX CURRENCY CONVERTER END -->
        </div> --}}
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
                
                <h1 style="text-align: center">Lập đơn nhập hàng</h1>
            </div>
            <br>
            <div class="row">

                <select name="" id="receipt_product">
                    <option value="0">Tên sản phẩm</option>
                    @foreach ($product as $pr)
                        <option value="{{ $pr->id }}">{{ $pr->product_name }}</option>
                    @endforeach
                    
                </select>&emsp;
                <select name="" id="receipt_color">
                    <option value="">Màu sản phẩm</option>
                </select>&emsp;
                <select name="" id="receipt_size">
                    <option value="">Size sản phẩm</option>
                </select> <br><br>
                <input type="number" placeholder="Nhập số lượng" name="" id="receipt_quantity"> &emsp;
                <input type="number" placeholder="Nhập giá" name="" id="receipt_price">₫
                <br><br>
                <a onclick="addReceipt()" class="btn btn-primary" href="javascript:">Thêm sản phẩm vào phiếu nhập</a>
                
            </div>
            <hr>
            <div class="row">
                <div id="hienthi">
                    @if (Session::has("Receipt") != null)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>màu</th>
                                <th>Size</th>
                                <th>Giá nhập</th>
                                <th>Số lượng</th>
                                <th>thành tiền</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Session::get('Receipt')->products as $item)
                            
                            <tr>
                                
                                <td scope="row">{{ $item['id_de'] }}</td>
                                <td scope="row">{{ $item['productInfo']->product_name }}</td>
                                <td>{{ $item['productInfo']->product_colors->where('color_id',$item['color'])->first()->color->color_name }}</td>
                                <td>{{ $item['size'] }}</td>
                                <td>{{ number_format($item['pri']) }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>{{ number_format($item['price']) }}₫</td>
                                
                                <td><a class="btn btn-danger" onclick="deleteListItemReceipt({{ $item['id_de'] }})" href="javascript:">X</a></td>

                            </tr>
                            @endforeach
                            <tr style="background-color: rgb(207, 207, 207)">
                                <td colspan="5">Tổng</td>
                                <td>{{ Session::get('Receipt')->totalquantity }}</td>
                                <td colspan="2">{{ number_format(Session::get('Receipt')->totalprice) }}₫</td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                    <form action="admin/goodsreceipts/add" method="post">
                        @csrf
                        Chọn nhà cung cấp: &emsp;
                        <select name="supplier" id="" >
                            <option value="">---chọn nhà cung cấp---</option>
                            @foreach ($supplier as $sp)
                                <option value="{{ $sp->id }}">{{ $sp->supplier_name }}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <input class="btn btn-primary btn-block" type="submit" value="nhập hàng">

                    </form>
                    
                    @endif
                </div>
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
    $(document).ready(function(){
        $("select#receipt_product").change(function(){
            var id = $(this).children("option:selected").val();
            
            $.ajax({
            url:'admin/goodsreceipts/get_color_from/'+id,
            type: 'GET',
            }).done(function(data)
            {
                
                // alert(data);
                // $("#receipt_size").empty();
                $("#receipt_color").empty();
                $("#receipt_color").html(data);
            });
        });
    });
    $(document).ready(function(){
        $("select#receipt_color").change(function(){
            var color = $(this).children("option:selected").val();
            var id =$('#receipt_product').val();
            
            $.ajax({
            url:'admin/goodsreceipts/get_size_from/'+id+'/'+color,
            type: 'GET',
            }).done(function(data)
            {
                
                
                $("#receipt_size").empty();
                $("#receipt_size").html(data);
            });
        });
    });

    function renderreceipt(data)
    {
        $("#hienthi").empty();
        $("#hienthi").html(data);
        // $("#total-quantity-show").text($("#total-quantity-Cart").val());
    }
    function addReceipt()
    {
        var id =$('#receipt_product').val();
        var color =$('#receipt_color').val();
        var size =$('#receipt_size').val();
        var qty =$('#receipt_quantity').val();
        var pri =$('#receipt_price').val();
        // alert(id+"-"+color+"-"+size+"-"+qty +"-"+pri)
        $.ajax({
            url: 'admin/goodsreceipts/add-receipt/'+id+'/'+color+'/'+size+'/'+qty+'/'+pri,
            type: 'GET',
        }).done(function(data){
            
            renderreceipt(data);
            // alert('done');
            alertify.success('Đã thêm sản phẩm');
            
            
        });
    }

    function deleteListItemReceipt(id)
        {
            // alert(id);
            $.ajax({
                url: 'admin/goodsreceipts/del-receipt/'+id,
                type: 'GET',
            }).done(function(data){
                // console.log(data);
                renderreceipt(data);
                alertify.success('Đã xóa sản phẩm');
                
                
            });
        }
    // $(document).ready(function(){
    //     $("select#receipt_product").change(function(){
    //         var id = $(this).children("option:selected").val();
    //         var id =$('#product_id').val();
    //         // var id = document.getElementById('sss').value;
    //         var color =$('#cao-get-color').val();
    //         // alert(id);
    //         $.ajax({
    //         url:'getquantity/'+id+'/'+color+'/'+ selected,
    //         type: 'GET',
    //         }).done(function(data)
    //         {
                
    //             // alert(data);
    //             $("#slcon").empty();
    //             $("#slcon").html(data);
    //         });
    //     });
    // });
    </script>
    </script>
@endsection