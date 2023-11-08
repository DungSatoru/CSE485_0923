@extends('layouts.master')

@section ('title', 'Create Book')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 d-flex justify-content-center">
      <div class="w-50 mt-3">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title m-0">Create Book Form</h3>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="Title" class="form-label">Title</label>
                <input type="text" name="Title" id="Title" class="form-control" placeholder="Enter book title" value="{{ old('Title') }}">
              </div>
              <div class="form-group">
                <label for="Author" class="form-label">Author</label>
                <input type="text" name="Author" id="Author" class="form-control" placeholder="Enter book Author" value="{{ old('Author') }}">
              </div>
              <div class="form-group">
                <label for="Genre" class="form-label">Genre</label>
                <select name="Genre" class="form-select">
                  <option value="default">Select an genre</option>
                  @foreach($genres as $genre)
                  <option value="{{ $genre }}">
                    {{ $genre }}
                  </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="PublicationYear" class="form-label">Publication Date</label>
                <input type="date" name="PublicationYear" id="PublicationYear" class="form-control" placeholder="Enter Publish date" value="{{ old('PublicationYear') }}">
                <div class="form-group">
                  <label for="ISBN" class="form-label">ISBN</label>
                  <input type="text" name="ISBN" id="ISBN" class="form-control" placeholder="Enter book ISBN" value="{{ old('ISBN') }}">
                </div>
                <div class="form-group">
                  <label for="CoverImageUrl" class="form-label">Image</label>
                  <input type="file" name="CoverImageUrl" id="CoverImageUrl" class="form-control">
                </div>
                <div class="d-flex justify-content-end my-4 gap-3">
                  <a href="{{ route('books.index') }}" class="btn btn-warning">Back</a>
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection