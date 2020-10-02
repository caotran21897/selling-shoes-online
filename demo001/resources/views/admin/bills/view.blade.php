@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="col-lg-12">
        <h1 class="page-header">Đơn hàng
            <small>Chi tiết</small>
        </h1>
        <h2 align="center">Thông tin hóa đơn</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Khách hàng</th>
                    <th>Ngày mua</th>
                    <th>Hình thức thanh toán</th>
                    <th>Thông tin giao hàng</th>
                    <th>Trạng thái đơn hàng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">{{ $detail[0]->order->user->email }}</td>
                    <td>{{ $detail[0]->order->date_buy }}</td>
                    <td>{{ $detail[0]->order->payment==1?"online":"shipper" }}</td>
                    <td>{{ $detail[0]->order->address_pay }}</td>
                    <td>{{ $detail[0]->order->order_statuses->last()->status->status_name }}</td>
                </tr>
                
            </tbody>
        </table>
        <form action="admin/bills/edit/{{ $detail[0]->order->id }}" method="post">
            @csrf
            <table>
                <tr>
                    <td>Thay đổi trạng thái hóa đơn: </td>
                    <td>
                        <select name="tt" id="">
                            @foreach ($stt as $st)
                                @if ($st->id ==$detail[0]->order->order_statuses->last()->status->id)
                                <option selected value="{{ $st->id }}">{{ $st->status_name }}</option>
                                @else
                                <option value="{{ $st->id }}">{{ $st->status_name }}</option>
                                @endif
                            @endforeach
                          
                        </select>
                    </td>
                    <td><input type="submit" value="Cập nhật"></td>
                </tr>
            </table>
        </form>
        <hr>
        <br>
        <h2 align="center">Chi tiết hóa đơn</h2>
       <table class="table">
           <thead>
               <tr>
                   <th>STT</th>
                   <th>Tên hàng</th>
                   <th>Màu</th>
                   <th>Size</th>
                   <th>Số lượng</th>
               </tr>
           </thead>
           <tbody>
               <?php $i =1;?>
               @foreach ($detail as $item)
                <tr>
                    <td scope="row">{{ $i }}</td>
                    <td>{{ $item->product_detail->product_color->product->product_name }}</td>
                    <td>{{$item->product_detail->product_color->color->color_name }}</td>
                    <td>{{ $item->product_detail->size_id }}</td>
                    <td>{{ $item->quantity_buy }}</td>
                    <?php $i++;?>
                </tr>
               @endforeach
              
               
           </tbody>
       </table>
    </div> 
</div>
@endsection