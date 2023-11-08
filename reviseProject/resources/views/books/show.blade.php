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
              @if(file_exists(public_path('uploads/images/' . $book->image)))
              <img class="w-75 h-50 object-fit-cover rounded-circle" src="{{ asset('uploads/images/' . $book->image) }}"
                alt="book Image">
              @else
              <img class="w-75 h-50 object-fit-cover rounded-circle" src="{{ $book->image }}" alt="book Image">
              @endif
              <h5 class="h5 text-white text-center mt-2 mb-5">{{ $book->name }} </h5>
              <a href="{{ route('books.edit', ['book' => $book]) }}" class="text-white">
                <i class="fa-solid fa-pen-to-square"></i>
              </a>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="h5 card-title border-bottom mb-3">Information</h5>
              <div class="row mb-3">
                <div class="col-md-6">
                  <p class="fw-medium m-0">Published Date</p>
                  <h6 class="h6 text-muted fw-normal m-0">{{ $book->published_date }}</h6>
                </div>
                <div class="col-md-6">
                  <p class="fw-medium m-0">Category</p>
                  <h6 class="h6 text-muted fw-normal m-0">{{ $book->categories }}</h6>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <p class="fw-medium m-0">Author Name</p>
                  <h6 class="h6 text-muted fw-normal m-0">{{ $book->author_name }}</h6>

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