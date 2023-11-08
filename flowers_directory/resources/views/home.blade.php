@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mt-3">
    <div class="row gap-3">
        <div class="card" style="width: 18rem;">
            <img class="mt-2 card-img-top" style="height: 150px;" src="https://flowershop.com.vn/wp-content/uploads/2020/09/y-nghia-hoa-huong-duong-4.jpg" alt="...">
            <div class="card-body">
                <h5 class="card-title">Flower</h5>
                <h3 class="card-text text-success">{{ $flowerCount }}</h3>
                <a href="{{route('flowers.index')}}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img class="mt-2 card-img-top" style="height: 150px;" src="https://www.nafsa.org/sites/default/files/media/image/nafsa-region-map.png" alt="...">
            <div class="card-body">
                <h5 class="card-title">Region</h5>
                <h3 class="card-text text-success">{{ $RegionCount }}</h3>
                <a href="{{route('regions.index')}}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>
@endsection