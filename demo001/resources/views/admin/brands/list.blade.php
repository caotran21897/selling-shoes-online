@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <h2>Danh sách thương hiệu</h2>
            <form action="admin/brands/add" method="post">
                @csrf
               
                  <label for="">Thêm thương hiệu mới</label>
                  <input type="text"  name="brand_name" id="" aria-describedby="helpId" placeholder="Nhập tên thương hiệu">
                  
                
                <input class="btn btn-primary" type="submit" value="Thêm">
            </form>
<hr>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên thương hiệu</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brand as $item)
                        <tr class="odd gradeX" align="center">
                            <td>{{$item->id}}</td>
                            <td>{{ $item->brand_name }}</td>
                            
                           
                            
                            <td class="center"><a data-toggle="modal" data-target="#exampleModal@@" class="btn btn-primary" href="javascript:"><i class="fa fa-pencil fa-fw"></i> Sửa</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection