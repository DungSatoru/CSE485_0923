@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h1>Create new author</h1>
    <form action="{{ route('authors.update', $author->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $author->name}}" required>
        </div>
        <div class="form-group">
            <label for="bio">Bio:</label>
            <input type="text" name="bio" class="form-control" value="{{ $author->bio}}" required>
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">Edit</button>
        </div>
    </form>
</div>
@endsection('content')