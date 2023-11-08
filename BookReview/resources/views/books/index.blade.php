@extends('layouts.master')

@section('title', 'Books Management System')

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
        </div>
        <div class="card-body px-0">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="text-center" scope="col">Image</th>
                <th scope="col">Title</th>
                <th class="text-center" scope="col">Author</th>
                <th class="text-center" scope="col">Genre</th>
                <th class="text-center" scope="col">Publication Year</th>
                <th class="text-center" scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach($books as $book)
              <tr>
                <td class="text-center">
                  @if(strpos($book->CoverImageUrl, 'http') === 0)
                  <img style="width: 50px; height: 50px;object-fit:cover;" class="rounded-circle" src="{{ $book->CoverImageUrl }}" alt="Hình ảnh">
                  @else
                  <img style="width: 50px; height: 50px;object-fit:cover;" class="rounded-circle" src="{{ asset('storage/' . $book->CoverImageUrl) }}" alt="Image is not exists">
                  @endif
                </td>
                <td>{{ $book->Title}}</td>
                <td class="text-center">{{ $book->Author}}</td>
                <td class="text-center">{{ $book->Genre}}</td>
                <td class="text-center">{{ $book->year}}</td>
                <td class="text-center">
                  <a href="{{ route('books.show', $book->BookID ) }}" class="btn btn-sm btn-primary">
                    <i class="fa-solid fa-eye"></i>
                  </a>
                  <a href="{{ route('books.edit', $book->BookID ) }}" class="btn btn-sm btn-warning">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $book->BookID }}">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                  <div class="modal fade" id="deleteModal-{{ $book->BookID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <form action="{{route('books.destroy', $book->BookID)}}" method="POST">
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
      @if(session('message') && session('type'))
      <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-body bg-{{ session('type') }} d-flex align-items-center justify-content-between">
            @if(session('type') == 'success')
            <i class="fas fa-check-circle text-light fs-5"></i>
            @elseif(session('type') == 'danger')
            <i class="fas fa-xmark-circle text-light fs-5"></i>
            @elseif(session('type') == 'info')
            <i class="fas fa-info-circle text-light fs-5"></i>
            @endif
            <h6 class="h6 text-white m-0">{{ session('message') }}</h6>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function() {
    const toastLiveExample = $('#liveToast');
    const toastBootstrap = new bootstrap.Toast(toastLiveExample.get(0));
    toastBootstrap.show();
  })
</script>
@endsection