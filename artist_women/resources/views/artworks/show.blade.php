@extends('layouts/app')

@section('title', $artwork->name)

@section('content')
<div class="container mt-3">
    <div class="team-single">
        <div class="row">
            <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                <div class="team-single-img rounded overflow-hidden">
                    @if(strpos($artwork->cover_image, 'http') === 0)
                    <!-- Loại <img> cho trường hợp hình ảnh trực tuyến -->
                    <img style="width: 300px; max-height: 300px;object-fit:cover;" class="w-100" src="{{ $artwork->cover_image }}" alt="Hình ảnh">
                    @else
                    <!-- Loại <img> cho trường hợp hình ảnh trong storage -->
                    <img style="width: 100%; max-height: 500px;object-fit:cover;" src="{{asset('storage/' . $artwork->cover_image) }}" alt="Hình ảnh">
                    @endif
                </div>
                <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                    <h2 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600 mt-2">{{$artwork->artist_name}}</h2>
                </div>
            </div>

            <div class="col-lg-8 col-md-7">
                <h3>Infomation</h3>
                <p class="sm-width-95 sm-margin-auto"><span class="fw-bold">Description: </span>{{$artwork->description}}</p>
                <p class="sm-width-95 sm-margin-auto"><span class="fw-bold">Art type: </span>{{$artwork->art_type}}</p>
                <p class="sm-width-95 sm-margin-auto"><span class="fw-bold text-dark">Media link: </span><a href="{{$artwork->media_link}}">{{$artwork->media_link}}</a></p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <a href="{{route('artworks.index')}}"><button type="button" class="btn btn-light">Cancel</button></a>
                <a href="{{route('artworks.edit', $artwork->id)}}"><button type="button" class="btn btn-success">Edit</button></a>
            </div>
        </div>
    </div>
</div>
@endsection