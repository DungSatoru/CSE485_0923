<nav class="navbar navbar-expand-lg bg-body-secondary border-bottom">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('index')}}">Home</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('books.index')}}">Book</a>
        </li>
      </ul>
      @if(isset($showSearchForm) && $showSearchForm)
      <form class="d-flex" role="search">
        @csrf
        <input class="form-control me-2" type="search" placeholder="Search name" value="{{$search}}" aria-label="Search"
          name="q">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      @endif
    </div>
  </div>
</nav>