@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin sản phẩm
                    <small>{{ $pr->product_name }}</small>
                </h1>
            </div>
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
            <!-- /.col-lg-12 -->
            <img width="200px" height="200px" src="{{ $pr->product_colors->first()->images->first()->image }}" alt="">
            <form action="admin/products/{{ $pr->id }}/updateinfo" method="post">
                @csrf
                <table class="table">
                    <tr>
                        <th>Tên sản Phẩm</th>
                        <td><input type="text" name="product_name" value="{{ $pr->product_name }}"></td>
                    </tr>
                    <tr>
                        <th>Thương hiệu</th>
                        <td>
                            <select name="brand" id="">
                                @foreach ($brand_public as $item)
                                    @if ($pr->brand_id == $item->id)
                                    <option selected value="{{ $item->id }}">{{ $item->brand_name }}</option>
                                    @else
                                    <option value="{{ $item->id }}">{{ $item->brand_name }}</option>
                                    @endif
                                    
                                @endforeach
                                
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <th>Kiểu Giày</th>
                        <td colspan="2">
                            <label class="radio-inline">
                            <input name="style" value="1" @if ($pr->style == 1){{ 'checked' }}@endif  type="radio">Nam
                            </label>
                            <label class="radio-inline">
                                <input name="style" value="3" @if ($pr->style == 3){{ 'checked' }}@endif type="radio">Nữ
                            </label>
                            <label class="radio-inline">
                                <input name="style" value="2" @if ($pr->style == 2){{ 'checked' }}@endif type="radio">Cả 2
                            </label>
                        </td>
                        
                        
                    </tr>
                    <tr>
                        <td>&emsp;</td>
                        <td ><input class="btn btn-primary" type="submit" value="Lưu"></td>
                        
                    </tr>
                </table>
            </form>
            <br>
           
                
                <table class="table">
                    <tr>
                        <th>Giá bán hiện tại</th>
                        <td>{{ number_format($pr->prices->last()->price) }}đ</td>
                        <td>&emsp;</td>
                        
                    </tr>
                    <tr>
                        <form action="admin/products/{{ $pr->id }}/updateprice" method="post">@csrf
                            <th>Cập nhật giá mới</th>
                            <td><input name="price" type="text"></td>
                            <td><input type="submit" class="btn btn-primary" value="Cập nhật"></td>
                        </form>
                    </tr>

                </table>
            
        <br>
            <form action="admin/products/{{ $pr->id }}/addimgcolor" enctype="multipart/form-data" method="post">
                @csrf
                {{ csrf_field() }}
                <table class="table">
                    <tr>
                <th>Màu sản phẩm</th>
                        <td>
                            @foreach ($pr->product_colors as $item)
                                {{ $item->color->color_name.", " }}
                            @endforeach
                        </td>
                        <td>&emsp;</td>
                
                    </tr>
                    <tr>
                        <tH>Thêm màu mới cho sản phẩm</tH>
                        <td><select name="color" id="">
                            @foreach ($color_public as $item)
                                    <option value="{{ $item->id }}">{{ $item->color_name }}</option>             
                            @endforeach</select> 
                        </td>
                        <td><input type="file" required="true" name="photos[]" multiple></td>
                    </tr>
                    <tr>
                        <td>&emsp;</td>
                        <td colspan="2">
                            @foreach ($size_public as $item)
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="size[]" id="" value="{{ $item->id }}">
                            {{ $item->id }}
                            </label>
                            &emsp;
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>&emsp;</td>
                        <td>&emsp;</td>
                        <td ><input class="btn btn-primary" type="submit" value="Thêm"></td>
                    </tr>

                </table>
            </form>
            
           
          @foreach ($pr->product_colors as $item)
          Màu: {{ $item->color->color_name }}  &emsp;<a href="">Xem hình ảnh</a>
              <table class="table">
                 <tr>
                    <th>Size</th>
                    
                     @foreach ($item->product_details as $de)
                         <td>{{ $de->size_id }}</td>
                         
                     @endforeach
                     
                 </tr>
                 <tr>
                     <th>Số lượng</th>
                     @foreach ($item->product_details as $de)
                         
                         <td>{{ $de->quantity }}</td>
                     @endforeach
                 </tr>
              </table>
          @endforeach

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection