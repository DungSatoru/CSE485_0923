@extends('layouts.app')

@section('title', 'Create Book')

@section('content')
<div class="container">
<h1>Create new book</h1>
    <form action="{{route('books.store')}}" method="POST">
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
@endsection