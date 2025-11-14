@extends('layout')
@section('title','Admin - Tin tức')
@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 m-0">Quản trị bài viết</h1>
    <a href="{{ route('admin.tin.create') }}" class="btn btn-primary">+ Thêm bài</a>
  </div>
  <table class="table table-hover">
    <thead><tr><th>ID</th><th>Tiêu đề</th><th>Danh mục</th><th>Ngày</th><th></th></tr></thead>
    <tbody>
      @foreach($items as $t)
        <tr>
          <td>{{ $t->id }}</td>
          <td>{{ $t->tieude }}</td>
          <td>{{ $t->danhMuc->ten ?? '-' }}</td>
          <td>{{ \Carbon\Carbon::parse($t->ngaydang)->format('d/m/Y') }}</td>
          <td class="text-end">
            <a href="{{ route('admin.tin.edit',$t->id) }}" class="btn btn-sm btn-outline-secondary">Sửa</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $items->links() }}
@endsection
