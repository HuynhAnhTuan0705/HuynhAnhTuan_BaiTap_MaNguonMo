@extends('admin.layouts.main')
@section('title','Quản trị - Danh mục')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 m-0">Danh mục</h1>
    <a class="btn btn-primary" href="{{ route('admin.danhmuc.create') }}">+ Thêm</a>
  </div>

  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead>
        <tr>
          <th style="width:80px">ID</th>
          <th>Tên</th>
          <th>Slug</th>
          <th class="text-end" style="width:160px">Thao tác</th>
        </tr>
      </thead>
      <tbody>
      @forelse($items as $m)
        <tr>
          <td>{{ $m->id }}</td>
          <td>{{ $m->ten }}</td>
          <td><code>{{ $m->slug }}</code></td>
          <td class="text-end">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.danhmuc.edit',$m) }}">Sửa</a>
            <form class="d-inline" method="POST" action="{{ route('admin.danhmuc.destroy',$m) }}">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Xóa danh mục này?')">Xóa</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="4" class="text-center text-muted">Chưa có danh mục</td></tr>
      @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-3">
    {{ $items->links() }}
  </div>
@endsection
