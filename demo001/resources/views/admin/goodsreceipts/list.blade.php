@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nhập Hàng
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Nhà cung cấp</th>
                        <th>Ngày Nhập</th>
                        <th>Chi tiết</th>
                     
                    </tr>
                </thead>
                <tbody>
                    @foreach ($receipt as $item)
                        <tr class="odd gradeX" align="center">
                           <td>{{ $item->id }}</td>
                           <td>{{ $item->supplier->supplier_name }}</td>
                           <td>{{ $item->date_receipt }}</td>
                            
                            <td class="center"><a class="btn btn-primary" href="admin/goodsreceipts/view/{{ $item->id }}"><i class="fa fa-pencil fa-fw"></i> View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection