@extends('layouts.app')
@section('title', 'Edit Information')
@section('content')
<div class="container mt-3">
    <h1>Edit Information</h1>

    <form action="{{ route('majors.update', $major->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group mt-1">
            <label class="fw-bold" for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $major->name }}" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="description">Description:</label>
            <textarea type="date" name="description" class="form-control" required>{{ $major->description}}</textarea>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="duration">Art type:</label>
            <input type="number" name="duration" class="form-control" value="{{ $major->duration}}" required>
        </div>
        <div class="form-group mt-3">
            <a href="{{ route('majors.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
            <button type="submit" class="btn btn-success ml-2">Save</button>
        </div>
    </form>
</div>
@endsection('content')