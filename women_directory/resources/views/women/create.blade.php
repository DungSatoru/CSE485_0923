@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h1>Create new woman</h1>
    <form action="{{route('women.store')}}" method="POST" enctype="multipart/form-data">
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
            <label class="fw-bold" for="birth_date">Birthday:</label>
            <input type="date" name="birth_date" class="form-control" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="field_of_work">Field of work:</label>
            <input type="text" name="field_of_work" class="form-control" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="biography">Bio:</label>
            <textarea type="text" name="biography" class="form-control" required></textarea>
        </div>
        <div class="form-group mt-3">
            <a href="{{ route('women.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
            <button type="submit" class="btn btn-success ml-2">Save</button>
        </div>
    </form>
</div>
@endsection('content')
