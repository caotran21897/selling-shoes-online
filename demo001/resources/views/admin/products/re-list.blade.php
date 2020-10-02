@foreach ($pro as $item)
    <tr class="odd gradeX" align="center">
        <td>{{$item->id}}</td>
        <td>{{ $item->product_name }}</td>
        <td>{{ $item->brand->brand_name }}</td>
        <td>
            @if ($item->style ==1)
                {{ 'Nam' }}
            @else
                {{ $item->style ==3?"Nữ":"cả 2" }}
            @endif
          </td>
        <td><a data-toggle="modal" data-target="#exampleModal" 
            onclick="chart({{ $item->id }})"
                href="javascript:">{{ number_FORMAT($item->prices->last()->price) }}₫</a></td>
        <td>{{ $item->product_describe }}</td>
        @if ($item->show ==1)
        <td class="center"><a onclick="showtohide({{ $item->id }})" class="btn btn-success" href="javascript:"> Hiển thị</a></td>
        @else
        <td class="center"><a onclick="hidetoshow({{ $item->id }})" class="btn btn-danger" href="javascript:">Ẩn</a></td>
        @endif
        
        <td class="center"><a class="btn btn-primary" href="admin/products/view/{{ $item->id }}"><i class="fa fa-pencil fa-fw"></i> View</a></td>
    </tr>
@endforeach