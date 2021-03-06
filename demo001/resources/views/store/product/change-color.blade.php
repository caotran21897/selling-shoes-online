<div  class="content-container">
    <div class="img-container">
        <img id="img-show" width="600px"  height="500px" src="{{ $color[0]->images->first()->image }}">
        <input id="cao-get-color" value="{{ $color[0] ->color->id }}" type="hidden" name="">
        <br>
       
        <button onclick="document.getElementById('modal-wrapper').style.display='block'"><font style="font-weight: bold;">Mô hình 3D</font></button>
    </div>
    <div class="text-container">
        <h1><font color="#f44e52">{{ $color[0]->product->brand->brand_name }}</font><br>
            <center>{{ $color[0]->product->product_name }}</center>
            <input id="product_id" value="{{ $color[0]->product->id }}" type="hidden" name="">
        </h1>
        <div class="color-product">
            
            <h4>Chọn màu:</h4>
            <?php $check_first_tick = 1; ?>
            @foreach ($color[0]->product->product_colors as $item)
            <input type="hidden" id="datacolor" value="{{ $item->color->id}}">
            <a onclick="change_color({{ $item->color->id }},{{ $color[0]->product->id }})" href="javascript:">
                <div class="cao-color" id="cao-color"  data-color="{{ $item->color->id }}" style="margin-left:10px; background-color:{{ $item->color->hex }}; border-radius:50%; width:3em;height:3em;float:left;
                border-top: 2px solid red;border-bottom: 2px solid blue;border-left: 2px solid gray;border-right: 2px solid green;">
                    @if ($check_first_tick == 1)
                        <h3 id="{{ $item->color->id }}" class="color_tick" style="color:gray !important">✔</h3>
                       
                        <?php $check_first_tick = 0;?>
                    @else
                        <h3 id="{{ $item->color->id }}" class="color_tick" style="color:gray !important; display:none;"> ✔</h3>
                        
                    @endif
                </div></a>
            @endforeach
        </div>
        <p>{{ $color[0]->product->product_describe }}</p>
        @if (count($sale)>0)
            @foreach ($sale as $item_sale)<?php $check =0;?>
                @foreach ($item_sale->products as $goto)
                
                    @if ($goto->id == $color[0]->product->id)
                        <?php $check =1;?>
                    @endif
                                                
                @endforeach   
                @if ($check==1)
                    
                    <h4 style="color:#E7AB3C" class="zprice"><strike>{{ number_format( $color[0]->product->prices->last()->price) }}₫</strike></h4>
                    <h4 style="color:#E7AB3C" class="price">{{ number_format( $color[0]->product->prices->last()->price*(1-$item_sale->discount*0.01)) }}₫</h4>
                    
                @else
                <h4 style="color:#E7AB3C" class="price">{{ number_format( $color[0]->product->prices->last()->price) }}₫</h4>
                @endif 
            @endforeach
            
        @else
            <h4 style="color:#E7AB3C" class="price">{{ number_format( $color[0]->product->prices->last()->price) }}₫</h4>
        @endif
        <br>
       
        
    </div>
    
    <br>
    <div style="float: left" class="cart">
        <div id="slcon">
            
            <p style="color:red">Còn {{ $color[0]->product_details[0]->quantity }} sản phầm</p>
            <input type="hidden" id="slcl" name="slcl" value="{{ $color[0]->product_details[0]->quantity }}">
        </div>
        Size:
        <select id="getSize" >
            @foreach ($color[0]->product_details as $item)
                <option value="{{ $item->size_id }}">{{ $item->size_id }}</option>   
            @endforeach
        </select>
        Số lượng
        <select name="" id="qty" >
            
            @for ($i = 1; $i <= 10; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        
        <a onclick="addCart({{ $color[0]->product->id }}, document.getElementById('cao-get-color').value,document.getElementById('getSize').value,document.getElementById('qty').value)" href="javascript:">Thêm vào giỏ hàng</a>    
    
    </div>
    
    
    
</div>
<!--3d modal-->
<div id="modal-wrapper" class="modal col-12">
    <div class="center">
        <div class="rotation">
        @foreach ($color[0]->images as $item)
        <img src="{{ $item->image }}">
        @endforeach        
        </div>
        <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close">&times;</span>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("select#getSize").change(function(){
            var selected = $(this).children("option:selected").val();
            var id =$('#product_id').val();
            // var id = document.getElementById('sss').value;
            var color =$('#cao-get-color').val();
            // alert(id);
            $.ajax({
            url:'getquantity/'+id+'/'+color+'/'+ selected,
            type: 'GET',
            }).done(function(data)
            {
                
                // alert(data);
                $("#slcon").empty();
                $("#slcon").html(data);
            });
        });
    });
</script>
<link rel="stylesheet" href="shoes/css/style.css">
<script src="shoes/js/360deg.js"></script>