@extends('layouts.master')

@section('title', 'Reviews')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="d-flex flex-wrap gap-3 my-3">
        @foreach($reviews as $review)
        <div class="card p-4 w-25 flex-grow-1">
          <h5 class="h4 m-0">{{ $review->user->name }}</h5>
          <p class="h5 text-muted">{{ $review->day }}</p>
          <p>
            @php
            $counter = 1;
            @endphp

            @for ($i = 5; $i >= 1; $i--)
            @if ($review->Rating >= $counter)
            <i class="fas fa-star" style="color: #fec900;"></i>
            @else
            <i class="far fa-star" style="color: #fec900;"></i>
            @endif

            @php
            $counter++;
            @endphp
            @endfor
          </p>
          <blockquote class="blockquote">"{{ $review->ReviewText }}"</blockquote>
        </div>
        @endforeach
      </div>
      <div class="d-flex justify-content-end">
        <a href="{{ route('books.index') }}" class="btn btn-lg btn-warning">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection