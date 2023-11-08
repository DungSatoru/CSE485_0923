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
            <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="w-100 d-flex justify-content-between align-items-center gap-5">
                <div class="form-group d-flex flex-column justify-content-center align-items-center position-relative">
                  <label for="image" class="form-label align-self-start ">Image</label>
                  <div class="mb-4">
                    @if(file_exists(public_path('uploads/images/' . $book->image)))
                    <img class="js-image rounded-circle object-fit-cover mt-3" style="width: 250px; height: 250px;"
                      src="{{ asset('uploads/images/' . $book->image) }}" alt="Book Image">
                    @else
                    <img class="js-image rounded-circle object-fit-cover mt-3" style="width: 250px; height: 250px;"
                      src="{{ $book->image }}" alt="Book Image">
                    @endif
                  </div>
                  <div class="position-absolute" style="top: 36px; right: 48px;">
                    <button class="js-open rounded-circle btn btn-sm btn-light shadow">
                      <i class="fa-solid fa-pen"></i>
                    </button>
                  </div>
                  <input class="js-file" hidden type="file" name="image" id="image">
                  @if($errors->has('image'))
                  <span class="text-danger">
                    {{ $errors->first('image') }}
                  </span>
                  @endif
                </div>
                <div class="flex-grow-1">
                  <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    @if($errors->has('name'))
                    <input type="text" name="name" class="form-control is-invalid" placeholder="Enter book name">
                    <span class="text-danger">
                      {{ $errors->first('name') }}
                    </span>
                    @else
                    <input type="text" name="name" class="form-control" placeholder="Enter book name"
                      value="{{ old('name') == '' ? $book->name : old('name') }}">
                    @endif
                  </div>
                  <div class="form-group">
                    <label class="form-label">Author</label>
                    <select name="author_id" class="form-select">
                      @foreach($authors as $author)
                      @if($author->id === $book->author_id)
                      <option value="{{ $author->id }}" selected>
                        {{ $author->name }}
                      </option>
                      @else
                      <option value="{{ $author->id }}">
                        {{ $author->name }}
                      </option>
                      @endif
                      @endforeach
                    </select>
                    @if($errors->has('author_id'))
                    <span class="text-danger">
                      {{ $errors->first('author_id') }}
                    </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label class="form-label">Catgegory</label>
                    <select name="categories" class="form-select">
                      @foreach($categories as $each)
                      @if($book->categories == $each)
                      <option selected value="{{ $each }}">{{ $each }}</option>
                      @else
                      <option value="{{ $each }}">{{ $each }}</option>
                      @endif
                      @endforeach
                    </select>
                    @if($errors->has('categories'))
                    <span class="text-danger">
                      {{ $errors->first('categories') }}
                    </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="published_date" class="form-label">Publish Date</label>
                    @if($errors->has('published_date'))
                    <input type="date" name="published_date" class="form-control is-invalid"
                      placeholder="Enter Publish Date" value="{{ old('published_date') }}">
                    <span class="text-danger">
                      {{ $errors->first('published_date') }}
                    </span>
                    @else
                    <input type="date" name="published_date" class="form-control" placeholder="Enter Publish Date"
                      value="{{ $book->published_date }}">
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
  const openElement = document.querySelector('.js-open');
  const imgElement = document.querySelector('.js-image');
  const fileInput = document.querySelector('.js-file');

  openElement.onclick = function (e) {
    e.preventDefault();
    fileInput.click();
  }

  fileInput.addEventListener('change', () => {
    const file = fileInput.files[0];
    if (file) {
      const imageUrl = URL.createObjectURL(file); // tạo url duy nhất cho cái ảnh
      imgElement.src = imageUrl; // gán lại cho cái img ảnh mới được chọn lúc nãy này
    }
  });
</script>
@endsection