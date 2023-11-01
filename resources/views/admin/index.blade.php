@extends('layouts.admin')

@section('content')


<section class=" my-4">
    <div class="container">
        <h4 class="text-muted text-uppercase">All Comics</h4>
        <a class="btn btn-primary position-fixed bottom-0 end-0 m-4" href="{{ route('admin.create') }}">Add Comic</a>


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
                                
                                <img width="100" src="{{ ($comic->thumb) }}" alt="">

                            </td>
                            <td>{{$comic->title}}</td>
                            <td>

                                <a href="{{route('admin.show', $comic->id)}}" class="btn btn-primary">View</a>

                                /Edit/Delete
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