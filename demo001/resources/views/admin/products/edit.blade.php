
@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">Product
                  <small>Add</small>
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
                  <div class="form-group">
                      <label>Product Name</label>
                      <input class="form-control" name="product_name" id="product_name" placeholder="Please Enter Name Product" />
                  </div>
                  <div class="form-group">
                      <label>Price</label>
                      <input type="number" class="form-control" name="price" placeholder="Please Enter Price  Product" />
                  </div>
                  <div class="form-group">
                        <label>brand</label>
                        <select class="form-control" name="brand" id="brand">
                            @foreach($brand as $br)
                              <option value="{{$br->id}}">{{$br->brand_name}}</option> 
                            @endforeach
                        </select>
                        <small id="helpId" class="form-text text-muted"><a href="admin/brands/list">quản lý thương hiệu</a></small>
                  </div>

                  <div class="form-group">
                    <label>style : &emsp;</label>
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
                      <label>Intro</label>
                      <textarea class="form-control ()ckeditor" id="demo" rows="3" name="product_describe"></textarea>
                  </div>
                  
                  {{-- <div class="form-group">
                      <label>Images</label>
                      <input type="file" required="true" name="photos[]" multiple>
                  </div> --}}
                 
                  
                  
                  <button type="submit" class="btn btn-default">Product Add</button>
                  <button type="reset" class="btn btn-default">Reset</button>
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