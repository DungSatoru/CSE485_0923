@extends ('layouts.master')

@section('Title', 'Home')

@section('content')
<div class="d-flex justify-content-center container pt-5 pb-5 align-items-center gap-3">
  <div class="d-flex">
    <div class="card" style="width: 18rem;">
      <div class="card-body d-flex flex-column align-items-center">
        <h6 class="card-title text-primary">Number of Authors</h6>
        <h5 class="h5">
          {{ $authorsCount }}
        </h5>
      </div>
    </div>
  </div>
  <div class="d-flex">
    <div class="card" style="width: 18rem;">
      <div class="card-body d-flex flex-column align-items-center">
        <h6 class="card-title text-primary">Number of Books</h6>
        <h5 class="h5">
          {{ $booksCount }}
        </h5>
      </div>
    </div>
  </div>
</div>
@endsection