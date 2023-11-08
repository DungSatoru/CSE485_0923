@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <div class="search">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    <div class="input-group-prepend">
                        <button class="input-group-text" id="basic-addon1">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card" style="width: 18rem;">
            <img src="https://xgalerie.vn/uploads/source/san-pham/hau-an-tuong/starry-night-over-the-rhone-1888-dem-day-sao-tren-rhone-vincent-van-gogh-1.png" class="card-img-top mt-2" alt="Image is not exists!">
            <div class="card-body">
                <h5 class="card-title">Women</h5>
                <p class="card-text text-success"><span class="fw-bold">{{$womenCount}}</span> woman</p>
                <a href="{{route('artworks.index')}}" class="btn btn-primary ">Go somewhere</a>
            </div>
        </div>
    </div>
</div>
@endsection