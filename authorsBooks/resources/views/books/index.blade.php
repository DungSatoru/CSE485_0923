@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h2>Book manager</h2>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <a href="books/create"><button type="button" class="btn btn-outline-success">Create new book</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Avatar</th>
                <th scope="col">Name</th>
                <th scope="col">Published date</th>
                <th scope="col">Categories</th>
                <th scope="col">Author</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <th scope="row">{{$book->id}}</th>
                <td>
                    @if(strpos($book->image, 'http') === 0)
                    <!-- Loại <img> cho trường hợp hình ảnh trực tuyến -->
                    <img style="height: 50px; width: 50px;" class="rounded" src="{{$book->image}}" alt="">
                    @else
                    <!-- Loại <img> cho trường hợp hình ảnh trong storage -->
                    <img style="height: 50px; width: 50px; object-fit:cover;" class="rounded" src="{{ asset('storage/' . $book->image) }}" alt="Hình ảnh">
                    @endif
                </td>
                <td>{{$book->name}}</td>
                <td>{{$book->published_date}}</td>
                <td>{{$book->categories}}</td>
                <td>{{$book->AuthorName}}</td>
                <td>
                    <a href="{{route('books.show', $book->id)}}"><button type="button" class="btn btn-info"><i class="fa-solid fa-eye"></i></button></a>
                    <a href="{{route('books.edit', $book->id)}}"><button type="button" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></button></a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$book->id}}"><i class="fa-solid fa-trash"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal-{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure want to delete this book?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
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
    <div class="card-footer">
        <div class="paginate">
            {{ $books->links('pagination::bootstrap-5')}}
        </div>
    </div>
</div>
@endsection