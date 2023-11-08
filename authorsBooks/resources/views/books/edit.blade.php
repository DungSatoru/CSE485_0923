@extends('layouts.app')
@section('title', 'Edit Information')
@section('content')
<div class="container mt-3">
    <h1>Edit Information</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if(strpos($book->cover_image, 'http') === 0)
        <img style="width: 300px; max-height: 300px;object-fit:cover;" class="w-25 rounded" src="{{ $book->image }}" alt="Hình ảnh">
        @else
        <img style="width: 300px; max-height: 300px;object-fit:cover;" class="w-25 rounded" src="{{ asset('storage/' . $book->cover_image) }}" alt="Image is not exists">
        @endif
        <div class="form-group mt-1">
            <label class="fw-bold" for="image">Avatar:</label>
            <input type="file" name="cover_image" class="form-control" enctype="multipart/form-data">
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="artist_name">Name:</label>
            <input type="text" name="artist_name" class="form-control" value="{{ $book->artist_name }}" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="description">Description:</label>
            <textarea type="date" name="description" class="form-control" required>{{ $book->description}}</textarea>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="art_type">Art type:</label>
            <input type="text" name="art_type" class="form-control" value="{{ $book->art_type}}" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="media_link">Media link:</label>
            <input type="text" name="media_link" class="form-control" value="{{ $book->media_link}}" required>
        </div>
        <div class="form-group mt-3">
            <a href="{{ route('books.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
            <button type="submit" class="btn btn-success ml-2">Save</button>
        </div>
    </form>
</div>
@endsection('content')