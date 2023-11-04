@extends('layouts.app')
@section('title', 'Major')
@section('content')
<div class="container mt-3">
    <h2>List of Major</h2>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <a href="majors/create"><button type="button" class="btn btn-outline-success">Create new major</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Duration</th>
                <th scope="col">Detail</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($majors as $major)
            <tr>
                <th scope="row">{{$major->id}}</th>
                <td>{{$major->name}}</td>
                <td>{{$major->description}}</td>
                <td>{{$major->duration}} years</td>
                <td><a href="{{route('majors.show', $major->id)}}"><button type="button" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></button></a></td>
                <td><a href="{{route('majors.edit', $major->id)}}"><button type="button" class="btn btn-outline-warning"><i class="fa-solid fa-pencil"></i></button></a></td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$major->id}}"><i class="fa-solid fa-trash"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal-{{$major->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure want to delete this major?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('majors.destroy', $major->id) }}" method="POST">
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
    <div class="pagination">
        {{ $majors->links() }}

    </div>
</div>
@endsection