@extends('layouts.admin')

@section('content')


<section class=" my-4">
    <div class="container">
        @if(session('message'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>{{session('message')}}</strong> 
        </div>

        @endif

        <h4 class="text-muted text-uppercase">All Comics</h4>
        <a class="btn btn-primary position-fixed bottom-0 end-0 m-4" href="{{ route('comics.create') }}">Add Comic</a>


        <div class="card">

            <div class="table-responsive-sm">
                <table class="table table-light mb-0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        @forelse ($comics as $comic)
                        <tr class="">
                            <td scope="row">{{$comic->id}}</td>
                            <td>
                                
                                @if (str_contains($comic->thumb, 'http'))
                                    <img width="100" class=" img-fluid" src="{{ $comic->thumb }}">
                                @else
                                    <img width="100" class=" img-fluid" src="{{asset('storage/' . $comic->thumb)}}" alt="">
                                @endif

                            </td>
                            <td>{{$comic->title}}</td>
                            <td>

                                <a href="{{route('comics.show', $comic->id)}}" class="btn btn-primary">View</a>
                                <a href="{{route('comics.edit', $comic->id)}}" class="btn btn-secondary">Edit</a>
                                
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalId-{{$comic->id}}">
                                    Delete
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{$comic->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$comic->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-{{$comic->id}}">Identificativo prodotto: {{$comic->id}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Attenzione! Se procedi eliminando il prodotto non potrai più tornare indietro, confermi?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                <!-- Delete form -->
                                                <form action="{{route('comics.destroy', $comic->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Confirm</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>


@endsection