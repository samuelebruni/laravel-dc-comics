@extends('layouts.admin')


@section('content')

<div class="container">

    <h1 class="py-4">Edit Saber number: {{$comic->id}}</h1>
    <h4 class="py-4">Edit Saber title: {{$comic->title}}</h4>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li> {{$error}} </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('comics.update', $comic)}}" method="POST" enctype="multipart/form-data">

        <!-- // Attention to Cross site request forgery attacks -->
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Acolyte Eco Battle staff" value="{{$comic->title}}">
            <small id="titleHelper" class="form-text text-muted">Type the title here</small>
            @error('title')
                <div class="text-danger"> {{$message}} </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="99.99" value="{{$comic->price}}">
            <small id="priceHelper" class="form-text text-muted">Type the price here</small>
            @error('price')
                <div class="text-danger"> {{$message}} </div>
            @enderror

        </div>

        <div class="d-flex gap-3">
            <div>
                @if (str_contains($comic->thumb, 'http'))
                    <img width="250" class=" img-fluid" src="{{ $comic->thumb }}">
                @else
                    <img width="250" class=" img-fluid" src="{{asset('storage/' . $comic->thumb)}}" alt="">
                @endif
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Update Cover Image</label>
                <input type="file" class="form-control" name="thumb" id="thumb" placeholder="" aria-describedby="thumb_helper">
                <div id="thumb_helper" class="form-text">Upload an image for the current product</div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary mt-3">
            Update
        </button>


    </form>

</div>


@endsection