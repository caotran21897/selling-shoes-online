@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <form action="" method="post">
                <div class="form-group">
                  <label for="">Tên Thương Hiệu</label>
                  <input type="text" class="form-control" name="brand" id="" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection