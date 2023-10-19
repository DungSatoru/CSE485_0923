@extends('layouts/app')

@section('title', $book->name . ' Author')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<div class="container">
    <div class="team-single">
        <div class="row">
            <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                <div class="team-single-img">
                    <img class="w-100" src="https://media.istockphoto.com/id/1016744004/vi/vec-to/%E1%BA%A3nh-ch%E1%BB%97-d%C3%A0nh-s%E1%BA%B5n-cho-h%E1%BB%93-s%C6%A1-h%C3%ACnh-b%C3%B3ng-m%C3%A0u-x%C3%A1m-kh%C3%B4ng-c%C3%B3-%E1%BA%A3nh.jpg?s=612x612&w=0&k=20&c=74k3Y5Mp89Yi68vLNjg8lgpGA0Fez1r2Nc5C-6EoMJU=" alt="">
                </div>
                <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                    <h2 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600">{{$book->title}}</h2>
                </div>
            </div>

            <div class="col-lg-8 col-md-7">
                <h3>Information is being updated...</h3>
            </div>
        </div>
    </div>
</div>

@endsection