@extends('layout')
@section('title','Admin - Sửa bài viết')

@section('content')
  <h1 class="h4 mb-3">Sửa bài viết (UI demo)</h1>

  <form>
    <div class="mb-3">
      <label class="form-label">Tiêu đề</label>
      <input class="form-control" value="{{ $tin->tieude }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Tóm tắt</label>
      <textarea class="form-control" rows="2">{{ $tin->tomtat }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Nội dung</label>
      <textarea class="form-control" rows="8">{{ $tin->noidung }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Danh mục</label>
      <select class="form-select">
        @foreach($danhMucs as $m)
          <option value="{{ $m->id }}" @selected(optional($tin->danhMuc)->id === $m->id)>
            {{ $m->ten }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="row g-3 mb-3">
      <div class="col-md-6">
        <label class="form-label">Tên file ảnh</label>
        <input class="form-control" value="{{ $tin->hinhanh }}">
      </div>
      <div class="col-md-6">
        <label class="form-label d-block">Xem trước</label>
        <img src="{{ asset('images/news/'.($tin->hinhanh ?: 'no-image.jpg')) }}"
             class="img-fluid rounded border" style="max-height:140px">
      </div>
    </div>

    <div class="d-flex gap-2">
      <button type="button" class="btn btn-primary" disabled>Cập nhật (UI mẫu)</button>
      <a class="btn btn-secondary" href="{{ route('admin.tin.index') }}">Quay lại</a>
    </div>
  </form>
@endsection
