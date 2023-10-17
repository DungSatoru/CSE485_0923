@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <h2>List of Books</h2>
    <button type="button" class="btn btn-outline-success">Add new Author</button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Detail</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <th scope="row">{{$book->id}}</th>
                <td>{{$book->title}}</td>
                <td><button type="button" class="btn btn-info"><i class="bi bi-eye"></i></button></td>
                <td><button type="button" class="btn btn-warning"><i class="bi bi-pencil"></i></button></td>
                <td><button type="button" class="btn btn-danger"><i class="bi bi-trash3"></i></button></td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection