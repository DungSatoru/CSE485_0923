@extends('layouts.master')

@section('title', 'Book Details')

@section('content')
<div class="container my-4">
  <div class="row">
    <div class="col-md-12 d-flex align-items-center justify-content-center">
      <div class="card border-0 shadow overflow-hidden" style="width: 650px">
        <div class="row g-0" style="height: 300px;">
          <div class="col-md-4">
            <div class="d-flex flex-column align-items-center justify-content-center h-100"
              style="background: linear-gradient(to right, #ee5a6f, #f29263);">
              @if(file_exists(public_path('uploads/images/' . $book->CoverImageUrl)))
              <img class="w-75 h-50 object-fit-cover rounded-circle"
                src="{{ asset('uploads/images/' . $book->CoverImageUrl) }}" alt="book Image">
              @else
              <img class="w-75 h-50 object-fit-cover rounded-circle" src="{{ $book->CoverImageUrl }}" alt="book Image">
              @endif
              <h5 class="h5 text-white text-center my-3">{{ $book->Title }} </h5>
              <a href="{{ route('books.edit', ['book' => $book->BookID]) }}" class="text-white">
                <i class="fa-solid fa-pen-to-square"></i>
              </a>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card-body d-flex flex-column justify-content-between h-100">
              <div class="row">
                <h5 class="h5 card-title border-bottom mb-3">Information</h5>
                <div class="col-md-6">
                  <p class="fw-medium m-0">Author Name</p>
                  <h6 class="h6 text-muted fw-normal m-0">{{ $book->Author }}</h6>
                </div>
                <div class="col-md-6">
                  <p class="fw-medium m-0">Publication</p>
                  <h6 class="h6 text-muted fw-normal m-0">{{ $book->PublicationYear }}</h6>
                </div>
                <div class="col-md-6">
                  <p class="fw-medium m-0">Genre</p>
                  <h6 class="h6 text-muted fw-normal m-0">{{ $book->Genre }}</h6>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="d-flex justify-content-end align-items-center gap-2">
                    <a href="{{ route('books.index') }}" class="btn btn-warning">Back</a>
                    <a href="{{ route('reviews.index', ['id' => $book->BookID]) }}" class="btn btn-info">Show
                      Reviews</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection