<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>{{ $tin->tieude }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

  <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary mb-3">← Về danh sách</a>

  <article class="row">
    <div class="col-lg-10 mx-auto">
      <h1 class="h3">{{ $tin->tieude }}</h1>
      <div class="text-muted mb-3">
        @if($tin->danhMuc)
          <span class="badge bg-secondary">{{ $tin->danhMuc->ten }}</span>
        @endif
        <span class="ms-2">Ngày đăng: {{ \Carbon\Carbon::parse($tin->ngaydang)->format('d/m/Y') }}</span>
      </div>

      <img src="{{ asset('images/news/'.($tin->hinhanh ?: 'no-image.jpg')) }}" class="img-fluid rounded mb-3" alt="{{ $tin->tieude }}">

      <div class="fs-5 lh-lg">{!! nl2br(e($tin->noidung)) !!}</div>
    </div>
  </article>

</body>
</html>
