@extends('layouts.app')

@section('title', 'Region manager')




@section('content')
<div class="container mt-3">
    <h2>Region manager</h2>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <a href="{{route('regions.create')}}"><button type="button" class="btn btn-outline-success">Create new region</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Region</th>
                <th scope="col">Flower</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($regions as $region)
            <tr>
                <th scope="row">{{$region->id}}</th>
                <td>{{$region->region_name}}</td>
                <td>{{$region->flower->name}}</td>
                <td>
                    <a href="{{route('regions.show', $region->id)}}"><button type="button" class="btn btn-info"><i class="fa-solid fa-eye"></i></button></a>
                    <a href="{{route('regions.edit', $region->id)}}"><button type="button" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></button></a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$region->id}}"><i class="fa-solid fa-trash"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal-{{$region->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure want to delete this region?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('regions.destroy', $region->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="paginator">
        {{ $regions->links('pagination::Bootstrap-5') }}
    </div>
</div>


@endsection