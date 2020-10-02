
@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">Sản phẩm
                  <small>Thêm mới</small>
              </h1>
          </div>
          <!-- /.col-lg-12 -->
          <div class="col-lg-7" style="padding-bottom:120px">
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



            {{-- form --}}
                <form action="admin/products/add" enctype="multipart/form-data" method="post">
                   @csrf
                   {{ csrf_field() }}
                  <div class="form-group">
                      <label>Tên sản phẩm</label>
                      <input class="form-control" name="product_name" id="product_name" placeholder="Tên sản phẩm" />
                  </div>
                  <div class="form-group">
                      <label>Giá bán</label>
                      <input type="number" class="form-control" name="price" placeholder="Giá sản phẩm" />
                  </div>
                  <div class="form-group">
                        <label>Thương hiệu</label>
                        <select class="form-control" name="brand" id="brand">
                            @foreach($brand as $br)
                              <option value="{{$br->id}}">{{$br->brand_name}}</option> 
                            @endforeach
                        </select>
                        {{-- <small id="helpId" class="form-text text-muted"><a href="admin/brands/list">quản lý thương hiệu</a></small> --}}
                  </div>

                  <div class="form-group">
                    <label>Kiểu giầy : &emsp;</label>
                    <label class="radio-inline">
                        <input name="style" value="1" checked type="radio">Nam
                    </label>
                    <label class="radio-inline">
                        <input name="style" value="3" type="radio">Nữ
                    </label>
                    <label class="radio-inline">
                        <input name="style" value="2" type="radio">Cả 2
                    </label>
                </div>

                  <div class="form-group">
                      <label>Chi tiết</label>
                      <textarea class="form-control ()ckeditor" id="demo" rows="3" name="product_describe"></textarea>
                  </div>

                  <div class="form-group">
                    <label >Chọn màu</label>
                    <select class="form-control" name="color" id="">
                    @foreach ($color_public as $cl)
                         <option value="{{ $cl->id }}">{{ $cl->color_name }}</option>
                    @endforeach
                       
                      
                    </select>
                  </div>

                  <div class="form-group">
                      <label>Hình ảnh sản phẩm</label>
                      <input type="file" required="true" name="photos[]" multiple>
                  </div>
                  <div class="form-check">
                      Chọn size: 
                      @foreach ($size_public as $item)
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="size[]" id="" value="{{ $item->id }}">
                      {{ $item->id }}
                    </label>
                    &emsp;
                      @endforeach
                    
                  </div>
                 
                  
                  
                  <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                  <button type="reset" class="btn btn-default">Đặt lại</button>
              <form>
          </div>
      </div>
      <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>



@endsection