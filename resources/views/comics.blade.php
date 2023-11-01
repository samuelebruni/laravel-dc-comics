@extends('layouts.app')

@section('content')
<section class=" py-5">
    <div class="container">
        <div class="row row-cols-md-3 g-3">

            @forelse ($comics as $comic)
            <div class="col">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ ($comic->thumb) }}" alt="">

                    <div class="card-body">
                        <h3>{{$comic->title}}</h3>
                    </div>
                </div>
            </div>
            @empty
            <div class="col">
                <p>No comic in the shop yet!</p>
            </div>

            @endforelse
        </div>
    </div>
</section>
@endsection
