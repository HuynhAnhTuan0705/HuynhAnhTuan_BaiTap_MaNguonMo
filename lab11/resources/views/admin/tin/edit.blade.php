@extends('admin.layouts.main')
@section('title','Sửa bài viết')

@section('content')
  <h1 class="h4 mb-3">Sửa bài viết</h1>

  <form method="POST" action="{{ route('admin.tin.update', $tin) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Tiêu đề</label>
      <input name="tieude" class="form-control" value="{{ old('tieude',$tin->tieude) }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Tóm tắt</label>
      <textarea name="tomtat" class="form-control" rows="2">{{ old('tomtat',$tin->tomtat) }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Nội dung</label>
      <textarea name="noidung" class="form-control" rows="8" required>{{ old('noidung',$tin->noidung) }}</textarea>
    </div>

    <div class="row g-3 mb-3">
      <div class="col-md-6">
        <label class="form-label">Danh mục</label>
        <select name="danh_muc_id" class="form-select">
          <option value="">-- Chọn danh mục --</option>
          @foreach($danhMucs as $m)
            <option value="{{ $m->id }}" @selected(old('danh_muc_id',$tin->danh_muc_id)==$m->id)>{{ $m->ten }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">Ngày đăng</label>
        <input type="datetime-local" name="ngaydang" class="form-control"
               value="{{ old('ngaydang', optional(\Carbon\Carbon::parse($tin->ngaydang))->format('Y-m-d\TH:i')) }}">
      </div>
      <div class="col-md-3">
        <label class="form-label">Tên file ảnh</label>
        <input name="hinhanh" class="form-control" value="{{ old('hinhanh',$tin->hinhanh) }}">
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label d-block">Xem trước ảnh</label>
      <img src="{{ asset('images/news/'.($tin->hinhanh ?: 'no-image.jpg')) }}" class="img-fluid rounded border" style="max-height:160px">
    </div>

    <div class="d-flex gap-2">
      <button class="btn btn-primary">Cập nhật</button>
      <a class="btn btn-secondary" href="{{ route('admin.tin.index') }}">Quay lại</a>
    </div>
  </form>
@endsection
