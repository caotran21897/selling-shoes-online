<option value="0">Màu sản phẩm</option>
@foreach ($color as $cl)
    <option value="{{ $cl->color_id }}">{{ $cl->color->color_name }}</option>
@endforeach