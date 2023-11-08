@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h1>Create new artist woman</h1>
    <form action="{{route('regions.store')}}" method="POST">
        @csrf
        <div class="form-group mt-1">
            <label class="fw-bold" for="region_name">Region:</label>
            <input type="text" name="region_name" class="form-control" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="flower_id">Flower:</label>
            <select type="text" name="flower_id" class="form-control" required>
                <option value="default">Select a Flower</option>
                @foreach($flowers as $each)
                <option value="{{ $each->id }}">{{ $each->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3">
            <a href="{{ route('regions.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
            <button type="submit" class="btn btn-success ml-2">Save</button>
        </div>
    </form>
</div>
@endsection('content')