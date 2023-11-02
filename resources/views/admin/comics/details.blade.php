@extends('layouts.admin')

@section('content')

<div class="p-5 mb-4 rounded-0 bg-dark text-white">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">{{$comic->title}}</h1>
        <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos deserunt doloribus laudantium, quidem assumenda maiores labore, quisquam id consequatur ipsam nisi eaque error magni inventore sapiente totam, illo itaque aspernatur?
        </p>
    </div>
</div>

<div class="container d-flex gap-2">

    <div>
        @if (str_contains($comic->thumb, 'http'))
            <img width="250" class=" img-fluid" src="{{ $comic->thumb }}">
        @else
            <img width="250" class=" img-fluid" src="{{asset('storage/' . $comic->thumb)}}" alt="">
        @endif
    </div>
    <div class="text">
        @if (str_contains($comic->price, '$'))
            <div class="display-3">{{$comic->price}}</div>
        @else
            <div class="display-3">${{$comic->price}}</div>
        @endif
        <a class="btn btn-success mt-4" href="#" role="button">Buy Now</a>
    </div>




</div>

@endsection