@extends('layouts.app')
@section('title', 'Edit Information')
@section('content')
<div class="container mt-3">
    <h1>Edit Information</h1>

    <form action="{{ route('authors.update', $author->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mt-1">
            <label class="fw-bold" for="image">Avatar:</label>
            <input type="file" name="image" class="form-control" enctype="multipart/form-data">
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $author->name }}" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="email">Email:</label>
            <textarea type="date" name="email" class="form-control" required>{{ $author->email}}</textarea>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="birthdate">Birthdate:</label>
            <input type="text" name="birthdate" class="form-control" value="{{ $author->birthdate}}" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="gender">Gender:</label>
            <select name="gender" id="" class="form-control">
                <option value="{{ $author->gender}}">{{$author->genderName}}</option>
                <option value="0">Female</option>
                <option value="1">Male</option>
            </select>
        </div>
        <div class="form-group mt-3">
            <a href="{{ route('authors.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
            <button type="submit" class="btn btn-success ml-2">Save</button>
        </div>
    </form>
</div>
@endsection('content')