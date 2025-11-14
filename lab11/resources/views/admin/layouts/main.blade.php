<!doctype html><html lang="vi"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title','Admin')</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body>
<nav class="navbar navbar-dark bg-dark"><div class="container">
  <a class="navbar-brand" href="{{ route('admin.home') }}">Admin</a>
  <div class="text-white">{{ auth()->user()->name ?? '' }}</div>
</div></nav>
<main class="container my-4">@include('admin.partials._flash') @yield('content')</main>
</body></html>
