@extends('admin.layouts.main')
@section('title','Thêm bài viết')

@section('content')
  <h1 class="h4 mb-3">Thêm bài viết</h1>

  <form method="POST" action="{{ route('admin.tin.store') }}">
    @csrf

    <div class="mb-3">
      <label class="form-label">Tiêu đề</label>
      <input name="tieude" class="form-control" value="{{ old('tieude') }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Tóm tắt</label>
      <textarea name="tomtat" class="form-control" rows="2">{{ old('tomtat') }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Nội dung</label>
      <textarea name="noidung" class="form-control" rows="8" required>{{ old('noidung') }}</textarea>
    </div>

    <div class="row g-3 mb-3">
      <div class="col-md-6">
        <label class="form-label">Danh mục</label>
        <select name="danh_muc_id" class="form-select">
          <option value="">-- Chọn danh mục --</option>
          @foreach($danhMucs as $m)
            <option value="{{ $m->id }}" @selected(old('danh_muc_id')==$m->id)>{{ $m->ten }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">Ngày đăng</label>
        <input type="datetime-local" name="ngaydang" class="form-control" value="{{ old('ngaydang') }}">
      </div>
      <div class="col-md-3">
        <label class="form-label">Tên file ảnh</label>
        <input name="hinhanh" class="form-control" placeholder="vd: 1.jpg" value="{{ old('hinhanh') }}">
      </div>
    </div>

    <div class="d-flex gap-2">
      <button class="btn btn-primary">Lưu</button>
      <a class="btn btn-secondary" href="{{ route('admin.tin.index') }}">Hủy</a>
    </div>
  </form>
@endsection
