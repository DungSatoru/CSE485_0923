@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h1>Create new Book</h1>
    <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-1">
            <label class="fw-bold" for="image">Avatar:</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="published_date">Published date:</label>
            <input type="date" name="published_date" class="form-control" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="categories">Art type:</label>
            <!-- <textarea type="date" name="categories" class="form-control" required></textarea> -->
            <select type="text" name="categories" class="form-control" required>
                @foreach($categories as $category)
                <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="media_link">Author</label>
            <select name="author_id" class="form-select">
                <option value="default">Select an Author</option>
                @foreach($authors as $author)
                <option value="{{ $author->id }}">
                    {{ $author->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3">
            <a href="{{ route('books.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
            <button type="submit" class="btn btn-success ml-2">Save</button>
        </div>
    </form>
</div>
@endsection('content')