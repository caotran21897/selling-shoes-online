@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <h2>Danh sách Màu</h2>
            <form action="admin/colors/add" method="post">
                @csrf
               
                  <label for="">Thêm màu mới</label>
                  <input type="text"  name="color_name" id="" aria-describedby="helpId" placeholder="Nhập tên màu">
                  <input type="color"  name="hex" id="" aria-describedby="helpId" placeholder="Nhập tên thương hiệu">
                  
                
                <input class="btn btn-primary" type="submit" value="Thêm">
            </form>
<hr>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên màu</th>
                        <th>Mã Hex</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($color as $item)
                        <tr class="odd gradeX" align="center">
                            <td>{{$item->id}}</td>
                            <td>{{ $item->color_name }}</td>
                            <td>{{ $item->hex }}</td>
                            
                           
                            
                            <td class="center"><a data-toggle="modal" data-target="#exampleModal@@" class="btn btn-primary" href="javascript:"><i class="fa fa-pencil fa-fw"></i> Sửa</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection