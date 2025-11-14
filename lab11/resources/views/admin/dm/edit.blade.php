@extends('admin.layouts.main')
@section('title','Sửa danh mục')

@section('content')
  <h1 class="h4 mb-3">Sửa danh mục</h1>

  <form method="POST" action="{{ route('admin.danhmuc.update', $danhmuc) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Tên danh mục</label>
      <input name="ten" class="form-control" required value="{{ old('ten',$danhmuc->ten) }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Slug (tự sinh theo tên khi lưu)</label>
      <input class="form-control" value="{{ $danhmuc->slug }}" disabled>
    </div>

    <div class="d-flex gap-2">
      <button class="btn btn-primary">Cập nhật</button>
      <a class="btn btn-secondary" href="{{ route('admin.danhmuc.index') }}">Quay lại</a>
    </div>
  </form>
@endsection
