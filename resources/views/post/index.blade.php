@extends('layout.home')
@section('title', 'home')

@section('content')

<div class="container-fluid bg-primary">
    <div class="row ">
        <div class="col-8 ">
            <h1 class="display-5 text-light">Crud app</h1>
        </div>
        <div class="col-4 mt-3">
            <form class="d-flex" action="{{ route('post.index') }}" method="get">

                <input class="form-control me-2" type="search" placeholder="Search"
                    value="{{request()->query('search')}}" name="search" aria-label="Search">
                <button class="btn btn-warning" type="submit">Search</button>
            </form>
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

            {{-- ADD NEW POST --}}

            <div class="col-2">
                <a href="{{ route('post.create') }}" class="btn btn-warning ">Add New Post</a>
            </div>
            {{-- POST DATA --}}

            @if (count($data) > 0)
                    <table class="table table-bordered table-hover  mt-1 ">
                @method('delete')
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col" style="width: 10%" >
                    
                            <form action="" method="GET" >
                                <select name="status" id="status_id"  onchange="this.form.submit()" class="form-control  bg-dark text-light border-0" >
                                <option disabled selected>Status..</option>
                                @foreach (config('setting.post_status') as $status)
                                <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                            </select>
                            </form>
                            </th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="table_body">

                    @foreach ($data as $post)
                    <tr>
                        <th>{{ $post->id }}</th>
                        <th>{{ $post->title }}</th>
                        <td>{{ Str::limit($post->description , 100 ,$end='....') }}</td>
                        <td>{{ config('setting.post_status')[$post->status] }}</td>
                        <td class="text-center ">
                            <img src="/storage/post_image/{{$post->post_image}}" width="100px" alt="">

                        </td>
                        <td class="d-flex justify-content-around align-items-center  ">
                            <a href="{{route('post.show',$post->id ) }}" class="btn btn-info text-light mt-2 "><i
                                    class="fas fa-eye"></i></a>

                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning text-light mt-2 "><i
                                    class="fas fa-edit"></i></a>
                            <form class="" action="{{ route('post.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger mt-2"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            @else
        
            <h1>record not found</h1>
                
            @endif

        

        </div>
    </div>
    {{-- PAGINATION --}}
    {{ $data->links() }}
</div>

{{-- MISTAKE --}}
{{-- 
<script type="text/javascript">
    $(document).ready(function() {
            $('select[name="status"]').on('change', function() {
                var status_val = $(this).val();
                var url = "{{route('post.index')}}";
                if(status_val){
                    $.ajax({
                        url:'post/ajax/'+status_val,
                        type:'get',
                       
                        success: function(posts){
                            
                            console.log(posts);
                            $("#table_body tr").remove();

                        }
                    })
                }
                
                }
            );
        });
</script> --}}


@endsection