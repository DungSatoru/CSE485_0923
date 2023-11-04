@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h1>Create new major</h1>
    <form action="{{route('majors.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-1">
            <label class="fw-bold" for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="duration">Duration:</label>
            <input type="number" name="duration" class="form-control" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="description">Description:</label>
            <textarea type="text" name="description" class="form-control" required></textarea>
        </div>
        
        <div class="form-group mt-3">
            <a href="{{ route('majors.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
            <button type="submit" class="btn btn-success ml-2">Save</button>
        </div>
    </form>
</div>
@endsection('content')