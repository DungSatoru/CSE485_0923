@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h1>Create new artist woman</h1>
    <form action="{{route('artworks.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-1">
            <label class="fw-bold" for="cover_image">Avatar:</label>
            <input type="file" name="cover_image" class="form-control">
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="artist_name">Name:</label>
            <input type="text" name="artist_name" class="form-control" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="description">Description:</label>
            <textarea type="date" name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="art_type">Art type:</label>
            <!-- <textarea type="date" name="art_type" class="form-control" required></textarea> -->
            <select type="text" name="art_type" class="form-control" required>
                <option value="">-- Select --</option>
                <option value="painting">Painting</option>
                <option value="music">Music</option>
                <option value="literature">Literature</option>
            </select>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="media_link">Media link:</label>
            <input type="text" name="media_link" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <a href="{{ route('artworks.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
            <button type="submit" class="btn btn-success ml-2">Save</button>
        </div>
    </form>
</div>
@endsection('content')