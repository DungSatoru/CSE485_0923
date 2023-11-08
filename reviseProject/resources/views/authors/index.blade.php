@extends('layouts.master')

@section('title', 'Authors Management System')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card mt-3">
        <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title m-0">Manage Authors</h3>
            <a href="{{ route('authors.create') }}" class="btn btn-success p-2">
              <i class="fa-solid fa-plus rounded-circle p-1 bg-light text-success me-1"></i>
              Add new Author
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
                <th scope="col">#</th>
                <th scope="col">Author Name</th>
                <th scope="col">Email</th>
                <th class="text-center" scope="col">Age</th>
                <!-- Thay vì hiển thị ra Sinh nhật, tính tuổi của tác giả... -->
                <!-- Sẽ tạo hàm trong Model để tính tuổi, lấy giới tính. -->
                <th class="text-center" scope="col">Gender</th>
                <th class="text-center" scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach($authors as $author)
              <tr>
                <th scope="row">{{ $author->id }}</th>
                <td>{{ $author->name}}</td>
                <td>{{ $author->email}}</td>
                <td class="text-center">{{ $author->age }}</td>
                <td class="text-center">{{ $author->gender_name }}</td>
                <!-- 0 là nam, 1 là nữ -->
                <!-- Tạo file riêng để Validate, và lúc validate nó sẽ báo lỗi. -->
                <td class="text-center">
                  <a href="{{ route('authors.show', ['author' => $author]) }}" class="btn btn-sm btn-primary">
                    <i class="fa-solid fa-eye"></i>
                  </a>
                  <a href="{{ route('authors.edit', ['author' => $author]) }}" class="btn btn-sm btn-warning">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                    data-bs-target="#deleteModal-{{ $author->id }}">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                  <div class="modal fade" id="deleteModal-{{ $author->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this author? <br>
                          If the author is deleted, all books will also disappear
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <form action="{{route('authors.destroy', $author->id)}}" method="POST">
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
            {{ $authors->links('pagination::bootstrap-5')}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection