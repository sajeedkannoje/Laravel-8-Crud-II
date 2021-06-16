@extends('layout.home')
@section('title', 'home')

@section('content')

    <div class="container-fluid bg-primary">
        <div class="row ">
            <div class="col-10 ">
                <h1 class="display-5 text-light">Crud app</h1>
            </div>
            {{-- ADD NEW POST --}}
            <div class="col-2">
                <a href="{{ route('post.create') }}" class="btn btn-warning m-3">Add New Post</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- ERROR MESSAGES --}}
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                @endif

                {{-- POST DATA --}}
                <table class="table table-bordered table-hover table-sm  table-striped mt-1 ">
                    @method('delete')
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $post)
                            <tr>
                                <th>{{ $post->id }}</th>
                                <th>{{ $post->title }}</th>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->status }}</td>
                                <td class="text-center ">
                                    <img src="/storage/post_image/{{$post->post_image}}" width="100px" alt="">
                                    
                                </td>
                                <td  >
                                    <a href="{{route('post.show',$post->id ) }}" class="btn btn-info text-light "  ><i class="fas fa-eye"></i></a>

                                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning text-light m-2 "><i
                                            class="fas fa-edit"></i></a>
                                    <form action="{{ route('post.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-2"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>


            </div>
        </div>
    </div>

    {{-- PAGINATION --}}
    {{ $data->links() }}
@endsection
