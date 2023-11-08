@extends('layouts.master')

@section ('title', 'Edit Book')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 d-flex justify-content-center">
      <div class="w-50 mt-3">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title m-0">Edit Book Form</h3>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('books.update', ['book' => $book->BookID]) }}"
              enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="w-100 d-flex justify-content-between align-items-center gap-5">
                <div class="form-group d-flex flex-column justify-content-center align-items-center position-relative">
                  <label for="CoverImageUrl" class="form-label align-self-start ">Image</label>
                  <div class="mb-4">
                    @if(file_exists(public_path('images/' . $book->CoverImageUrl)))
                    <img class="js-image rounded-circle object-fit-cover mt-3" style="width: 250px; height: 250px;"
                      src="{{ asset('images/' . $book->CoverImageUrl) }}" alt="CoverImageUrl">
                    @else
                    <img class="js-image rounded-circle object-fit-cover mt-3" style="width: 250px; height: 250px;"
                      src="{{ $book->CoverImageUrl }}" alt="CoverImageUrl">
                    @endif
                  </div>
                  <div class="position-absolute" style="top: 36px; right: 48px;">
                    <button class="js-open rounded-circle btn btn-sm btn-light shadow">
                      <i class="fa-solid fa-pen"></i>
                    </button>
                  </div>
                  <input class="js-file" hidden type="file" name="CoverImageUrl" id="CoverImageUrl">
                  @if($errors->has('CoverImageUrl'))
                  <span class="text-danger">
                    {{ $errors->first('CoverImageUrl') }}
                  </span>
                  @endif
                </div>
                <div class="flex-grow-1">
                  <div class="form-group">
                    <label for="Title" class="form-label">Title</label>
                    @if($errors->has('Title'))
                    <input type="text" name="Title" class="form-control is-invalid" placeholder="Enter book Title">
                    <span class="text-danger">
                      {{ $errors->first('Title') }}
                    </span>
                    @else
                    <input type="text" name="Title" class="form-control" placeholder="Enter book Title"
                      value="{{ old('Title') == '' ? $book->Title : old('Title') }}">
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="Author" class="form-label">Author</label>
                    @if($errors->has('Author'))
                    <input type="text" name="Author" class="form-control is-invalid" placeholder="Enter book Author">
                    <span class="text-danger">
                      {{ $errors->first('Author') }}
                    </span>
                    @else
                    <input type="text" name="Author" class="form-control" placeholder="Enter book Author"
                      value="{{ old('Author') == '' ? $book->Author : old('Author') }}">
                    @endif
                  </div>
                  <div class="form-group">
                    <label class="form-label">Genre</label>
                    <select name="Genre" class="form-select">
                      @foreach($genres as $genre)
                      @if($genre === $book->Genre)
                      <option value="{{ $genre }}" selected>
                        {{ $genre }}
                      </option>
                      @else
                      <option value="{{ $genre }}">
                        {{ $genre }}
                      </option>
                      @endif
                      @endforeach
                    </select>
                    @if($errors->has('Genre'))
                    <span class="text-danger">
                      {{ $errors->first('Genre') }}
                    </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="PublicationYear" class="form-label">Publish Date</label>
                    @if($errors->has('PublicationYear'))
                    <input type="date" name="PublicationYear" class="form-control is-invalid"
                      placeholder="Enter Publish Date" value="{{ old('PublicationYear') }}">
                    <span class="text-danger">
                      {{ $errors->first('PublicationYear') }}
                    </span>
                    @else
                    <input type="date" name="PublicationYear" class="form-control" placeholder="Enter Publish Date"
                      value="{{ $book->PublicationYear }}">
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="ISBN" class="form-label">ISBN</label>
                    @if($errors->has('ISBN'))
                    <input type="text" name="ISBN" class="form-control is-invalid" placeholder="Enter book ISBN">
                    <span class="text-danger">
                      {{ $errors->first('ISBN') }}
                    </span>
                    @else
                    <input type="text" name="ISBN" class="form-control" placeholder="Enter book ISBN"
                      value="{{ old('ISBN') == '' ? $book->ISBN : old('ISBN') }}">
                    @endif
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-end my-4 gap-3">
                <a href="{{ route('books.index') }}" class="btn btn-warning">Back</a>
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $('.js-open').click(function (e) {
    e.preventDefault();
    $('.js-file').click();
  });

  $('.js-file').change(function () {
    const file = this.files[0];
    if (file) {
      const imageUrl = URL.createObjectURL(file);
      $('.js-image').attr('src', imageUrl);
    }
  });
</script>
@endsection