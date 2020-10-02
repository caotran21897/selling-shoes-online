@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khuyến mãi
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Chi tiết khuyến mãi</th>
                        <th>Mức giảm giá</th>
                        <th>Thời gian bắt đầu</th>
                        <th>Thời gian kết thúc</th>
                        <th>Xem</th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sale as $item)
                        <tr class="odd gradeX" align="center">
                            <td>{{$item->id}}</td>
                            <td>{{ $item->sale_detail }}</td>
                            <td>{{ $item->discount}}</td>
                            <td>{{ $item->begin }}</td>

                            <td>{{ $item->end }}</td>
                         
                           
                            
                            <td class="center"><a class="btn btn-primary" href="admin/salepromotions/view/{{ $item->id }}"><i class="fa fa-pencil fa-fw"></i> Chi tiết</a></td>
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