@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h2>List of Artist Women</h2>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <a href="artworks/create"><button type="button" class="btn btn-outline-success">Create new artwork</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">description</th>
                <th scope="col">Detail</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artworks as $artwork)
            <tr>
                <th scope="row">{{$artwork->id}}</th>
                <td>{{$artwork->artist_name}}</td>
                <td>{{$artwork->description}}</td>
                <td><a href="{{route('artworks.show', $artwork->id)}}"><button type="button" class="btn btn-info"><i class="fa-solid fa-eye"></i></button></a></td>
                <td><a href="{{route('artworks.edit', $artwork->id)}}"><button type="button" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></button></a></td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$artwork->id}}"><i class="fa-solid fa-trash"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal-{{$artwork->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure want to delete this artwork?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('artworks.destroy', $artwork->id) }}" method="POST">
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
        {{ $artworks->links() }}
    </div>
</div>
@endsection