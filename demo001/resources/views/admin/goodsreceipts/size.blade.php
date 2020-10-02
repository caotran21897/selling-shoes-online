<option value="0">Chọn size</option>
@foreach ($size as $s)
    <option value="{{ $s->size_id }}">{{ $s->size_id }}</option>
@endforeach