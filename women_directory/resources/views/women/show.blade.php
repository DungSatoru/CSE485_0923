@extends('layouts/app')

@section('title', $woman->name)

@section('content')
<div class="container mt-3">
    <div class="team-single">
        <div class="row">
            <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                <div class="team-single-img rounded overflow-hidden">
                    <!-- <img class="w-100" src="{{$woman->image}}" alt="">
                    <img style="width:100%;" src="{{asset('storage/'.$woman->image) }}" alt="Hình ảnh"> -->
                    @if(strpos($woman->image, 'http') === 0)
                    <!-- Loại <img> cho trường hợp hình ảnh trực tuyến -->
                    <img style="width: 300px; max-height: 300px;object-fit:cover;" class="w-100" src="{{ $woman->image }}" alt="Hình ảnh">
                    @else
                    <!-- Loại <img> cho trường hợp hình ảnh trong storage -->
                    <img style="width: 100%; max-height: 500px;object-fit:cover;" src="{{ asset('storage/' . $woman->image) }}" alt="Hình ảnh">
                    @endif

                </div>
                <h1>{{$woman->image}}</h1>
                <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                    <h2 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600 mt-3">{{$woman->name}}</h2>
                </div>
            </div>

            <div class="col-lg-8 col-md-7">
                <h3>Information is being updated...</h3>
                <p class="sm-width-95 sm-margin-auto"><span class="fw-bold">Birthday: </span>{{$woman->birth_date}}</p>
                <p class="sm-width-95 sm-margin-auto"><span class="fw-bold">Filed of work: </span>{{$woman->field_of_work}}</p>
                <p class="sm-width-95 sm-margin-auto"><span class="fw-bold">Bio: </span>{{$woman->biography}}</p>
            </div>
        </div>
    </div>
</div>

@endsection