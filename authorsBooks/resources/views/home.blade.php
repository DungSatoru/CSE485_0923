@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row mt-3 gap-3">
        <div class="card" style="width: 18rem;">
            <img style="height: 150px;" class="card-img-top mt-2" src="https://selfpublishing.com/wp-content/uploads/2020/03/How-to-Become-an-Author-8-Steps-to-Become-an-Author-of-a-Bestselling-Book.png"  alt="...">
            <div class="card-body">
                <h5 class="card-title">Authors</h5>
                <h3 class="card-text text-warning fw-bold">{{$authorsCount}}</h3>
                <a href="{{ route('authors.index') }}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img style="height: 150px;" class="card-img-top mt-2" src="https://images.unsplash.com/photo-1589998059171-988d887df646?auto=format&fit=crop&q=80&w=1000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8OXx8fGVufDB8fHx8fA%3D%3D"  alt="...">
            <div class="card-body">
                <h5 class="card-title">Authors</h5>
                <h3 class="card-text text-warning fw-bold">{{$booksCount}}</h3>
                <a href="{{ route('books.index') }}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>
@endsection