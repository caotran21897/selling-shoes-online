@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nhập hàng
                    <small> Chi Tiết {{ $gd[0]->goods_receipt_id }}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Sản Phẩm</th>
                        <th>Số lượng nhập</th>
                        <th>Giá nhập</th>
                     
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gd as $item)
                        <tr class="odd gradeX" align="center">
                          <td>{{ $item->product_detail_id }}</td>
                          <td>{{ $item->product_detail->product_color->product->product_name ."_".$item->product_detail->product_color->color->color_name."_".$item->product_detail->size_id }}</td>
                        <td>{{ $item->quantity_receipt }}</td>
                        <td>{{ number_format($item->price_receipt) }} đ</td>
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