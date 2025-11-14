<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Tin tức</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

  <h1 class="h3 mb-3">Danh sách tin tức</h1>

  <form class="mb-3" method="GET" action="{{ route('home') }}">
    <div class="row g-2">
      <div class="col-md-4">
        <input name="q" class="form-control" value="{{ $q }}" placeholder="Tìm theo tiêu đề...">
      </div>
      <div class="col-md-4">
        <select name="dm" class="form-select">
          <option value="">-- Tất cả danh mục --</option>
          @foreach($danhMucs as $m)
            <option value="{{ $m->slug }}" @selected($dm===$m->slug)>{{ $m->ten }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-2">
        <button class="btn btn-primary w-100">Lọc</button>
      </div>
      @if($q || $dm)
      <div class="col-md-2">
        <a class="btn btn-outline-secondary w-100" href="{{ route('home') }}">Xóa lọc</a>
      </div>
      @endif
    </div>
  </form>

  @if($items->isEmpty())
    <div class="alert alert-info">Không có bài viết phù hợp.</div>
  @else
    <div class="row g-3">
    @foreach($items as $t)
      <div class="col-md-4">
        <div class="card h-100">
          <img class="card-img-top" src="{{ asset('images/news/'.($t->hinhanh ?: 'no-image.jpg')) }}" alt="{{ $t->tieude }}">
          <div class="card-body">
            <h5 class="card-title">
              <a href="{{ route('tin.show', $t->id) }}" class="text-decoration-none">{{ $t->tieude }}</a>
            </h5>
            <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($t->tomtat, 120) }}</p>
            @if($t->danhMuc)
              <span class="badge bg-secondary">{{ $t->danhMuc->ten }}</span>
            @endif
          </div>
        </div>
      </div>
    @endforeach
    </div>

    <div class="mt-3">
      {{ $items->links() }}
    </div>
  @endif

</body>
</html>
