@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">

    


    <div class="container-fluid">
        <div class="row"><?php 
                        GLOBAL $sumstt;
                        
                        $sumstt =0;
                    ?>
            <div class="col-lg-12">
                <h1 class="page-header">Đơn hàng
                    <small>Danh sách</small>
                </h1>
               
            </div> 
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã đơn hàng</th>
                        <th>Tên người mua</th>
                        <th>Ngày mua</th>
                        <th>Hình thức thanh toán</th>
                        
                        <th>Trạng thái</th>
                        
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                    
                <tbody>
                    @foreach ($bill as $item)
                        <tr class="odd gradeX" align="center">
                            <td>{{$item->id}}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->date_buy }}</td>
                            <td>{{ $item->payment==1?"Thanh toán trực tuyến":"Thanh toán khi nhận hàng" }}</td>
                            <td><a href="javascript:">{{ $item->order_statuses->last()->status->status_name }}</a></td>
                            <input type="hidden" id="tt" value="{{ $item->order_statuses->last()->status->id }}">
                                @if ( $item->order_statuses->last()->status->id == 1)
                                    <?php $sumstt ++;?>
                                @endif                            
                        
                                
                            <td class="center"><a class="btn btn-primary" href="admin/bills/view/{{ $item->id }}"><i class="fa fa-pencil fa-fw"></i> Xem</a></td>
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