@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khuyến mãi
                    <small>Chi tiết</small>
                </h1>
            </div>
            <div class="col-lg-12">
                <h4>{{ 'ID khuyến mãi: '.$sp->id}}</h4>
                <h4>{{ " giảm giá ".$sp->discount."%"  }}</h4>
                <h4>{{  "bắt đầu từ ".$sp->begin. " ===> ".$sp->end }}</h4>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                       
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sp->products as $item)
                        <tr class="odd gradeX" align="center">
                            <td>{{$item->id}}</td>
                            <td>{{ $item->product_name }}</td>
                            
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