@extends('layout')
@section('title','Thêm bài viết')
@section('content')
  <h1 class="h4 mb-3">Thêm bài viết (UI demo)</h1>
  <form>
    <div class="mb-3"><label class="form-label">Tiêu đề</label><input class="form-control" placeholder="..." /></div>
    <div class="mb-3"><label class="form-label">Tóm tắt</label><textarea class="form-control" rows="2"></textarea></div>
    <div class="mb-3"><label class="form-label">Nội dung</label><textarea class="form-control" rows="6"></textarea></div>
    <div class="mb-3"><label class="form-label">Danh mục</label>
      <select class="form-select">
        @foreach($danhMucs as $m)<option>{{ $m->ten }}</option>@endforeach
      </select>
    </div>
    <div class="mb-3"><label class="form-label">Hình ảnh (tên file)</label><input class="form-control" placeholder="1.jpg" /></div>
    <button class="btn btn-primary" type="button" disabled>Lưu (UI mẫu)</button>
    <a class="btn btn-secondary" href="{{ route('admin.tin.index') }}">Hủy</a>
  </form>
@endsection
