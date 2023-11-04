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
</div>
@endsection