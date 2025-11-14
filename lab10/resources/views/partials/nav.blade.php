<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-semibold" href="{{ route('tin.index') }}">Lab10 News</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div id="mainNav" class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link {{ request()->has('dm') ? '' : 'active' }}" href="{{ route('tin.index') }}">Tất cả</a></li>
        @isset($danhMucs)
          @foreach($danhMucs as $m)
            <li class="nav-item">
              <a class="nav-link {{ request('dm')===$m->slug?'active':'' }}"
                 href="{{ route('tin.index', array_filter(['dm'=>$m->slug,'q'=>request('q')])) }}">
                 {{ $m->ten }}
              </a>
            </li>
          @endforeach
        @endisset
      </ul>

      <form class="d-flex" method="GET" action="{{ route('tin.index') }}">
        @if(request('dm'))
          <input type="hidden" name="dm" value="{{ request('dm') }}">
        @endif
        <input class="form-control me-2" type="search" name="q" placeholder="Tìm tiêu đề..."
               value="{{ request('q') }}">
        <button class="btn btn-outline-light" type="submit">Tìm</button>
      </form>
    </div>
  </div>
</nav>
