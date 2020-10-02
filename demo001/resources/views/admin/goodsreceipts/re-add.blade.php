@if (Session::has("Receipt") != null)
<table class="table">
    <thead>
        <tr>
            <th>ID sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Màu</th>
            <th>Size</th>
            <th>Giá nhập</th>
            <th>Số lượng</th>
            <th>thành tiền</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        @foreach (Session::get('Receipt')->products as $item)
        <tr>
            <td scope="row">{{ $item['id_de'] }}</td>
            <td scope="row">{{ $item['productInfo']->product_name }}</td>
            <td>{{ $item['productInfo']->product_colors->where('color_id',$item['color'])->first()->color->color_name }}</td>
            <td>{{ $item['size'] }}</td>
            <td>{{ number_format($item['pri']) }}</td>
            <td>{{ $item['quantity'] }}</td>
            <td>{{ number_format($item['price']) }}₫</td>
            <td><a class="btn btn-danger" onclick="deleteListItemReceipt({{ $item['id_de'] }})" href="javascript:">X</a></td>

        </tr>
        @endforeach
        <tr style="background-color: rgb(207, 207, 207)">
            <td colspan="5">Tổng</td>
            <td>{{ Session::get('Receipt')->totalquantity }}</td>
            <td colspan="2">{{ number_format(Session::get('Receipt')->totalprice) }}₫</td>
        </tr>
        
    </tbody>
</table>
<form action="admin/goodsreceipts/add" method="post">
    @csrf
    Chọn nhà cung cấp: &emsp;
    <select name="supplier" id="" >
        <option value="">---Chọn nhà cung cấp---</option>
        @foreach ($supplier as $sp)
            <option value="{{ $sp->id }}">{{ $sp->supplier_name }}</option>
        @endforeach
    </select>
    <br><br>
    <input class="btn btn-primary btn-block" type="submit" value="nhập hàng">

</form>
@endif