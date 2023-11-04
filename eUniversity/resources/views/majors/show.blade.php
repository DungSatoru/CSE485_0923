@extends('layouts/app')

@section('title', $major->name)

@section('content')
<div class="container mt-3">
    <div class="team-single">
        <div class="row">
            <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                    <h2 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600 mt-2">{{$major->name}}</h2>
                </div>
            </div>

            <div class="col-lg-8 col-md-7">
                <h3>Information is being updated...</h3>
                <p class="sm-width-95 sm-margin-auto"><span class="fw-bold">Description: </span>{{$major->description}}</p>
                <p class="sm-width-95 sm-margin-auto"><span class="fw-bold">Duration: </span>{{$major->duration}} years</p>
            </div>
        </div>
    </div>
</div>

@endsection