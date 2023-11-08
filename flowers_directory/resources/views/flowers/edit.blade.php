@extends('layouts.app')
@section('title', 'Edit Information')
@section('content')
<div class="container mt-3">
    <h1>Edit Information</h1>

    <form action="{{ route('flowers.update', $flower->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if(strpos($flower->image_url, 'http') === 0)
        <img style="width: 300px; max-height: 300px;object-fit:cover;" class="w-25 rounded" src="{{ $flower->image_url }}" alt="Hình ảnh">
        @else
        <img style="width: 300px; max-height: 300px;object-fit:cover;" class="w-25 rounded" src="{{ asset('storage/' . $flower->image_url) }}" alt="Image is not exists">
        @endif

        <div class="form-group mt-1">
            <label class="fw-bold" for="image_url">Avatar:</label>
            <input type="file" name="image_url" class="form-control"  enctype="multipart/form-data">
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="name">Name:</label>
            <input type="text" value="{{ $flower->name }}"  name="name" class="form-control" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="description">Description:</label>
            <textarea type="date"  name="description" class="form-control" required>{{ $flower->description }}</textarea>
        </div>
        <div class="form-group mt-3">
            <a href="{{ route('flowers.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
            <button type="submit" class="btn btn-success ml-2">Save</button>
        </div>
    </form>
</div>
@endsection('content')