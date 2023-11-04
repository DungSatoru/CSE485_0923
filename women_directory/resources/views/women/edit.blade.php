@extends('layouts.app')
@section('title', 'Edit Information')
@section('content')
<div class="container mt-3">
    <h1>Edit Information</h1>
    <form action="{{ route('women.update', $woman->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if(strpos($woman->image, 'http') === 0)
        <img style="width: 300px; max-height: 300px;object-fit:cover;" class="w-25 rounded" src="{{ $woman->image }}" alt="Hình ảnh">
        @else
        <img style="width: 300px; max-height: 300px;object-fit:cover;" class="w-25 rounded" src="{{ asset('storage/' . $woman->image) }}" alt="Image is not exists">
        @endif
        <div class="form-group mt-1">
            <label class="fw-bold" for="image">Avatar:</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $woman->name }}" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="birth_date">Birthday:</label>
            <input type="date" name="birth_date" class="form-control" value="{{ $woman->birth_date}}" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="field_of_work">Field of work:</label>
            <input type="text" name="field_of_work" class="form-control" value="{{ $woman->field_of_work}}" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="biography">Biography:</label>
            <textarea type="text" name="biography" class="form-control" required>{{ $woman->biography}}</textarea>
        </div>
        <div class="form-group mt-3">
            <a href="{{ route('women.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
            <button type="submit" class="btn btn-success ml-2">Save</button>
        </div>
    </form>
</div>
@endsection('content')