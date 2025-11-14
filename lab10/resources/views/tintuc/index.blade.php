@extends('layout')
@section('title','Danh sách tin tức')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 m-0">Danh sách tin tức</h1>
    @if($dm || $q)
      <a href="{{ route('tin.index') }}" class="btn btn-sm btn-outline-secondary">Xoá bộ lọc</a>
    @endif
  </div>

  @if($dsTin->isEmpty())
    <div class="alert alert-info">Không có bài viết phù hợp.</div>
  @else
    <div class="row g-4">
      @foreach($dsTin as $tin)
        <div class="col-md-6 col-lg-4">
          <x-news.card :tin="$tin" />
          @if($tin->danhMuc)
            <div class="mt-2">
              <a class="badge bg-secondary text-decoration-none"
                 href="{{ route('tin.index',['dm'=>$tin->danhMuc->slug]) }}">{{ $tin->danhMuc->ten }}</a>
            </div>
          @endif
        </div>
      @endforeach
    </div>
    <div class="mt-4 d-flex justify-content-center">
      {{ $dsTin->links() }}
    </div>
  @endif
@endsection
