@extends('layouts.app')

@section('title', 'Flower manager')

@section('content')
<div class="container">
    <h2>Manager Flower</h2>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <a href="{{route('flowers.create')}}"><button type="button" class="btn btn-outline-success">Create new flower</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($flowers as $flower)
            <tr>
                <th scope="row">{{$flower->id}}</th>
                <td>
                    @if(strpos($flower->image_url, 'http') === 0)
                    <img style="width: 50px; height: 50px;object-fit:cover;" class="rounded-circle" src="{{ $flower->image_url }}" alt="Hình ảnh">
                    @else
                    <img style="width: 50px; height: 50px;object-fit:cover;" class="rounded-circle" src="{{ asset('storage/' . $flower->image_url) }}" alt="Image is not exists">
                    @endif
                </td>
                <td>{{$flower->name}}</td>
                <td style="width: 50%;">{{$flower->description}}</td>
                <td>
                    <a href="{{route('flowers.show', $flower->id)}}"><button type="button" class="btn btn-info"><i class="fa-solid fa-eye"></i></button></a>
                    <a href="{{route('flowers.edit', $flower->id)}}"><button type="button" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></button></a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$flower->id}}"><i class="fa-solid fa-trash"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal-{{$flower->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure want to delete this flower?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('flowers.destroy', $flower->id) }}" method="POST">
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
        {{ $flowers->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection