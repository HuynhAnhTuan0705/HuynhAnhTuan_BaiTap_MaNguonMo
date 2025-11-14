@extends('admin.layouts.main')
@section('title','Thêm danh mục')

@section('content')
  <h1 class="h4 mb-3">Thêm danh mục</h1>

  <form method="POST" action="{{ route('admin.danhmuc.store') }}">
    @csrf
    <div class="mb-3">
      <label class="form-label">Tên danh mục</label>
      <input name="ten" class="form-control" required placeholder="VD: Công nghệ" value="{{ old('ten') }}">
    </div>

    <div class="d-flex gap-2">
      <button class="btn btn-primary">Lưu</button>
      <a class="btn btn-secondary" href="{{ route('admin.danhmuc.index') }}">Hủy</a>
    </div>
  </form>
@endsection
