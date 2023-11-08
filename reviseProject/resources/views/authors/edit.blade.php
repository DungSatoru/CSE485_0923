@extends('layouts.master')

@section ('title', 'Edit Author')
<!-- Nếu tạo validation bằng Request, thì sẽ chỉnh được message báo lỗi, còn nếu validator bình thường thì không. -->
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 d-flex justify-content-center">
      <div class="w-50 mt-3">
        <div class="card">
          <div class="card-header">
            <div class="card-title fw-medium m-0">Edit Author Form</div>
          </div>
          <div class="card-body">
            <!-- Tải code từ GITHUB về, rồi composer install ở trong folder. Rồi php aritsan migrate, db:seed  -->
            <form method="POST" action="{{ route('authors.update', [ 'author' => $author ]) }}">
              @csrf
              @method('PUT')
              <div class="form-group mb-3">
                <label for="name" class="form-label">Name</label>
                @if($errors->has('name'))
                <input type="text" name="name" id="name" class="form-control is-invalid"
                  placeholder="Enter Author name">
                <!-- Ở bài này, mình chỉ validated 1 một trường hợp duy nhất là 'REQUIRED'.
                Tức là nó chỉ báo lỗi khi mà dữ liệu của ô input trống. => Xóa value -->
                <span class="text-danger">
                  {{ $errors->first('name') }}
                </span>
                @else
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Author name"
                  value="{{ old('name') == '' ? $author->name : old('name') }}">
                @endif
              </div>
              <div class="form-group mb-3">
                <label for="email" class="form-label">Name</label>
                @if($errors->has('email'))
                <input type="email" name="email" id="email" class="form-control is-invalid" placeholder="Enter email">
                <span class="text-danger">
                  {{ $errors->first('email') }}
                </span>
                @else
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email"
                  value="{{ old('email') == '' ? $author->email : old('email') }}">
                @endif
                <!-- Validated, old sẽ bắt attribute name của thẻ. -->
              </div>
              <div class="form-group mb-3">
                <label for="birthdate" class="form-label">Birthdate</label>
                @if($errors->has('birthdate'))
                <input type="date" name="birthdate" id="birthdate" class="form-control is-invalid"
                  placeholder="Enter Birthdate" value="{{ $author->birthdate }}">
                <span class="text-danger">
                  {{ $errors->first('birthdate') }}
                </span>
                @else
                <input type="date" name="birthdate" id="birthdate" class="form-control" placeholder="Enter Birthdate"
                  value="{{ $author->birthdate }}">
                @endif
              </div>
              <div class="mb-3 d-flex gap-3">
                @if($author->gender == 0)
                <div class="form-check">
                  <label for="male" class="form-label">Male</label>
                  <input type="radio" name="gender" id="male" value="1" class="form-check-input">
                </div>
                <div class="form-check">
                  <label for="female" class="form-label">Female</label>
                  <input type="radio" name="gender" id="female" value="0" class="form-check-input" checked>
                </div>
                @else
                <div class="form-check">
                  <label for="male" class="form-label">Male</label>
                  <input type="radio" name="gender" id="male" value="1" class="form-check-input" checked>
                </div>
                <div class="form-check">
                  <label for="female" class="form-label">Female</label>
                  <input type="radio" name="gender" id="female" value="" class="form-check-input">
                </div>
                @endif
                @if($errors->has('gender'))
                <span class="text-danger">
                  {{ $errors->first('birthdate') }}
                </span>
                @endif
              </div>
              <div class="d-flex justify-content-end my-4 gap-3">
                <a href="{{ route('authors.index') }}" class="btn btn-warning">Back</a>
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