@extends('layouts.master')

@section('title', 'Authors Management System')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card mt-3">
        <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title m-0">Manage Books</h3>
            <a href="{{ route('books.create') }}" class="btn btn-success p-2">
              <i class="fa-solid fa-plus rounded-circle p-1 bg-light text-success me-1"></i>
              Add new Book
            </a>
          </div>
          @if(session('message') && session('type'))
          <div class="alert alert-{{ session('type') }} mt-2">
            <span>{{session('message')}}</span>
          </div>
          @endif
        </div>
        <div class="card-body px-0">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="text-center" scope="col">Image</th>
                <th scope="col">Author Name</th>
                <th class="text-center" scope="col">Published Date</th>
                <th class="text-center" scope="col">Category</th>
                <th class="text-center" scope="col">Author</th>
                <th class="text-center" scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach($books as $book)
              <tr>
                <td class="text-center">
                  @if(file_exists(public_path('uploads/images/' . $book->image)))
                  <img class="rounded-circle object-fit-cover" style="width: 50px; height: 50px;"
                    src="{{ asset('uploads/images/' . $book->image) }}" alt="Book Image">
                  @else
                  <img class="rounded-circle object-fit-cover" style="width: 50px; height: 50px;"
                    src="{{ $book->image }}" alt="Book Image">
                  @endif
                </td>
                <td>{{ $book->name}}</td>
                <td class="text-center">{{ $book->publish_date}}</td>
                <td class="text-center">{{ $book->categories}}</td>
                <td class="text-center">{{ $book->author_name}}</td>
                <td class=" text-center">
                  <a href="{{ route('books.show', ['book' => $book]) }}" class="btn btn-sm btn-primary">
                    <i class="fa-solid fa-eye"></i>
                  </a>
                  <a href="{{ route('books.edit', ['book' => $book]) }}" class="btn btn-sm btn-warning">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                    data-bs-target="#deleteModal-{{ $book->id }}">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                  <div class="modal fade" id="deleteModal-{{ $book->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this books?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <form action="{{route('books.destroy', $book->id)}}" method="POST">
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
        </div>
        <div class="card-footer">
          <div class="paginate">
            {{ $books->links('pagination::bootstrap-5')}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection