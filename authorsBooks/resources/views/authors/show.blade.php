@extends('layouts.app')

@section('title', 'Author Details')

@section('content')
<div class="container mt-3">
  <div class="team-single">
    <div class="row">
      <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
        <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
          <h2 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600 mt-2">{{$author->name}}</h2>
        </div>
      </div>

      <div class="col-lg-8 col-md-7">
        <h3 class="bg-muted">Information</h3>
        <p class="sm-width-95 sm-margin-auto"><span class="fw-bold">Email: </span>{{$author->email}}</p>
        <p class="sm-width-95 sm-margin-auto"><span class="fw-bold">Birthdate: </span>{{$author->birthdate}}</p>
        <p class="sm-width-95 sm-margin-auto"><span class="fw-bold text-dark">Gender: </span>{{$author->genderName}}</p>
      </div>
    </div>
    <div class="row">
      <div>
        <a href="{{ route('authors.index') }}"><button class="btn btn-light">Cancel</button></a>
        <a href="{{ route('authors.edit', $author->id) }}"><button class="btn btn-outline-success">Edit</button></a>
      </div>
    </div>
  </div>
</div>

@endsection


<!-- 

@section('content')
<div class="container my-4">
  <div class="row">
    <div class="col-md-12 d-flex align-items-center justify-content-center">
      <div class="card border-0 shadow overflow-hidden" style="max-width: 650px">
        <div class="row g-0" style="height: 300px;">
          <div class="col-md-4">
            <div class="d-flex flex-column align-items-center justify-content-center h-100"
              style="background: linear-gradient(to right, #ee5a6f, #f29263);">
              @if(file_exists(public_path('uploads/images/' . $author->cover_image)))
              <img class="w-75 h-50 object-fit-cover rounded-circle"
                src="{{ asset('uploads/images/' . $author->cover_image) }}" alt="author Image">
              @else
              <img class="w-75 h-50 object-fit-cover rounded-circle" src="{{ $author->cover_image }}"
                alt="author Image">
              @endif
              <h5 class="h5 text-white text-center mt-2 mb-5">{{ $author->artist_name }} </h5>
              <a href="{{ route('authors.edit', ['author' => $author]) }}" class="text-white">
                <i class="fa-solid fa-pen-to-square"></i>
              </a>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="h5 card-title border-bottom mb-3">Information</h5>
              <div class="row mb-3">
                <div class="col-md-6">
                  <p class="fw-medium m-0">Email</p>
                  <h6 class="h6 text-muted fw-normal m-0">ledinhtu880@gmail.com</h6>
                </div>
                <div class="col-md-6">
                  <p class="fw-medium m-0">Phone</p>
                  <h6 class="h6 text-muted fw-normal m-0">0865176605</h6>
                </div>
              </div>
              <h5 class="h5 card-title border-bottom mb-3">Education</h5>
              <div class="row">
                <div class="col-md-6">
                  <p class="fw-medium m-0">Major</p>
                  <h6 class="h6 text-muted fw-normal m-0">Information System</h6>
                </div>
                <div class="col-md-6">
                  <p class="fw-medium m-0">University</p>
                  <h6 class="h6 text-muted fw-normal m-0">Đại Học Thủy Lợi</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection -->