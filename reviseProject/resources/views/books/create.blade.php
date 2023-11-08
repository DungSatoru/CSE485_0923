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
            <!-- NẾU XỬ LÝ ẢNH LUÔN LUÔN PHẢI CÓ enctype="multipart/form-data" -->
            <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="name" class="form-label">Name</label>
                @if($errors->has('name'))
                <input type="text" name="name" id="name" class="form-control is-invalid" placeholder="Enter book name"
                  value="{{ old('name') }}">
                <span class="text-danger">
                  {{ $errors->first('name') }}
                </span>
                @else
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter book name"
                  value="{{ old('name') }}">
                @endif
              </div>
              <div class="form-group">
                <label for="author_id" class="form-label">Author</label>
                @if($errors->has('author_id'))
                <select name="author_id" class="form-select is-invalid">
                  <option value="default">Select an Author</option>
                  @foreach($authors as $author)
                  <option value="{{ $author->id }}">
                    {{ $author->name }}
                  </option>
                  @endforeach
                </select>
                <span class="text-danger">
                  {{ $errors->first('author_id') }}
                </span>
                @else
                <select name="author_id" class="form-select">
                  <option value="default">Select an Author</option>
                  @foreach($authors as $author)
                  <option value="{{ $author->id }}">
                    {{ $author->name }}
                  </option>
                  @endforeach
                </select>
                @endif
              </div>
              <div class="form-group">
                <label for="categories" class="form-label">Category</label>
                @if($errors->has('categories'))
                <select name="categories" class="form-select is-invalid">
                  <option value="default">Select an Category</option>
                  @foreach($categories as $key => $value)
                  <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
                <span class="text-danger">
                  {{ $errors->first('author_id') }}
                </span>
                @else
                <select name="categories" class="form-select">
                  <option value="default">Select an Category</option>
                  @foreach($categories as $key => $value)
                  <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
                @endif
              </div>
              <div class="form-group">
                <label for="published_date" class="form-label">Publish date</label>
                @if($errors->has('published_date'))
                <input type="date" name="published_date" id="published_date" class="form-control is-invalid"
                  placeholder="Enter Publish date" value="{{ old('published_date') }}">
                <span class="text-danger">
                  {{ $errors->first('published_date') }}
                </span>
                @else
                <input type="date" name="published_date" id="published_date" class="form-control"
                  placeholder="Enter Publish date" value="{{ old('published_date') }}">
                @endif
              </div>
              <div class="form-group">
                <label for="image" class="form-label">Image</label>
                @if($errors->has('image'))
                <input type="file" name="image" id="image" class="form-control is-invalid">
                <span class="text-danger">
                  {{ $errors->first('image') }}
                </span>
                @else
                <input type="file" name="image" id="image" class="form-control">
                @endif
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