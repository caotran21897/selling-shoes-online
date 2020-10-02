@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <H2 align="center">Thống kê</H2>
            <div align="center">
                <input type="month" name="" id="date">
            </div>
<br>
            <div align="center">
                <a id="getchartbrand"  class="btn btn-primary" onclick="chart_brand()">Thống kê theo thương hiệu</a>
                <a id="getchartall" onclick="chart_all()"  class="btn btn-primary">Thống kê theo sản phẩm</a>
            </div>
            <hr>
        </div>
        <div class="row">
            <div align="center" id="chart">
                <h3>Mời chọn tháng năm để tiến hành thống kê</h3>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function chart_brand(){
        var date= document.getElementById('date').value;
      
        $.ajax({
            url: 'admin/chartbrand/'+date,
            type: 'GET',
        }).done(function(data){
            // alert(JSON.stringify(data));
            $("#chart").empty();
            $("#chart").html(data);
        });
    }
     function chart_all(){
        var date= document.getElementById('date').value;
      
        $.ajax({
            url: 'admin/chartall/'+date,
            type: 'GET',
        }).done(function(data){
            // alert(JSON.stringify(data));
            $("#chart").empty();
            $("#chart").html(data);
        });
    }
    
</script>
@endsection