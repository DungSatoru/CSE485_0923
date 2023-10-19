@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h1>Create new author</h1>
    <form action="{{route('authors.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="bio">Bio:</label>
            <input type="text" name="bio" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection('content')