@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <h2>Danh sách nhà cung cấp</h2>
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
            <form action="admin/suppliers/add" method="post">
                @csrf
               
                  <label for="">Thêm nhà cung cấp mới</label>
                  <input type="text"  name="supplier_name" id="" aria-describedby="helpId" placeholder="Nhập tên nhà cung cấp">
                  <input type="text"  name="supplier_address" id="" aria-describedby="helpId" placeholder="Nhập địa chỉ nhà cung cấp">
                  <input type="text"  name="supplier_phone" id="" aria-describedby="helpId" placeholder="Nhập SĐT nhà cung cấp">
                  
                
                <input class="btn btn-primary" type="submit" value="Thêm">
            </form>
<hr>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên nhà cung cấp</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($supplier as $item)
                        <tr class="odd gradeX" align="center">
                            <td>{{$item->id}}</td>
                            <td>{{ $item->supplier_name }}</td>
                            <td>{{ $item->supplier_address }}</td>
                            <td>{{ $item->supplier_phone }}</td>
                            
                           
                            
                            <td class="center"><a data-toggle="modal" data-target="#exampleModal@@" class="btn btn-primary" href="javascript:"><i class="fa fa-pencil fa-fw"></i> Sửa</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection