@extends('layouts.app')

@section('title', 'Create author')

@section('content')
<div class="container mt-3">
    <h1>Create new author</h1>
    <form action="{{route('authors.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- <div class="form-group mt-1">
            <label class="fw-bold" for="image">Avatar:</label>
            <input type="file" name="image" class="form-control">
        </div> -->
        <div class="form-group mt-1">
            <label class="fw-bold" for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="email">Email</label>
            <input type="text" name="email" class="form-control" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="birthdate">Birthday:</label>
            <input type="date" name="birthdate" class="form-control" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="gender">Gender</label>
            <select name="gender" id="" class="form-control" required>
                <option value="">--Choose gender--</option>
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
@endsection