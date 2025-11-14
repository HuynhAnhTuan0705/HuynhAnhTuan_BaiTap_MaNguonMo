@extends('admin.layouts.main')
@section('title','Quản trị - Bài viết')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 m-0">Bài viết</h1>
    <a class="btn btn-primary" href="{{ route('admin.tin.create') }}">+ Thêm</a>
  </div>

  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead>
        <tr>
          <th style="width:70px">ID</th>
          <th>Tiêu đề</th>
          <th style="width:180px">Danh mục</th>
          <th style="width:130px">Ngày</th>
          <th style="width:220px" class="text-end">Thao tác</th>
        </tr>
      </thead>
      <tbody>
      @forelse($items as $t)
        <tr class="{{ $t->deleted_at ? 'table-warning' : '' }}">
          <td>{{ $t->id }}</td>
          <td class="text-truncate" style="max-width:520px">{{ $t->tieude }}</td>
          <td>{{ $t->danhMuc->ten ?? '-' }}</td>
          <td>{{ \Carbon\Carbon::parse($t->ngaydang)->format('d/m/Y') }}</td>
          <td class="text-end">
            @if(!$t->deleted_at)
              <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.tin.edit',$t) }}">Sửa</a>
              <form class="d-inline" method="POST" action="{{ route('admin.tin.destroy',$t) }}">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Đưa vào thùng rác?')">Xóa</button>
              </form>
            @else
              <form class="d-inline" method="POST" action="{{ route('admin.tin.restore',$t->id) }}">
                @csrf
                <button class="btn btn-sm btn-success" onclick="return confirm('Khôi phục bài viết?')">Khôi phục</button>
              </form>
              <form class="d-inline" method="POST" action="{{ route('admin.tin.force',$t->id) }}">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Xóa vĩnh viễn?')">Xóa vĩnh viễn</button>
              </form>
            @endif
          </td>
        </tr>
      @empty
        <tr><td colspan="5" class="text-center text-muted">Chưa có bài viết</td></tr>
      @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-3">
    {{ $items->links() }}
  </div>
@endsection
