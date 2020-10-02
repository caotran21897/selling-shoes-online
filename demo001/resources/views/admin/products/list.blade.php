@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
      <div class="modal-body">
        <div class="container-fluid">
            <canvas id="myChart"></canvas>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


  
   
    <?php $sumstt; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">sản phẩm
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div id="showorhide">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Thương hiệu</th>
                            <th>Kiểu</th>
                            <th>Giá</th>
                            <th>Chi tiết</th>
                            <th>Hiển thị/Ẩn</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
