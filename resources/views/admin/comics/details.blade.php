@extends('layouts.admin')

@section('content')

<div class="p-5 mb-4 rounded-0">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">{{$comic->title}}</h1>
        <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos deserunt doloribus laudantium, quidem assumenda maiores labore, quisquam id consequatur ipsam nisi eaque error magni inventore sapiente totam, illo itaque aspernatur?
        </p>
    </div>
</div>

<div class="container d-flex gap-2">

    <img src="{{( $comic->thumb) }}" alt="">
    <div class="text">
        <div class="display-3"> {{$comic->price}}</div>
        <a class="btn btn-success mt-4" href="#" role="button">Buy Now</a>
    </div>




</div>

@endsection