@extends('layout.home')
@section('title', 'edit page')

@section('content')

    <div class="container">
        <div class="row">
            <h1 class="display-1">Update Post</h1>
            <div class="col-md-12">

                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                @endif
                {{-- UPDATE DATA FORM --}}

                <form method="post" action="{{ route('post.update', $post->id) }}" class="border rounded p-3 m-3 shadow" enctype="multipart/form-data" >
                    @csrf
                    @method('put')
                    <div class="row mb-3">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputTitle" value="{{ $post->title }}"
                                name="title">
                            @error('title')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}

                                </div>
                            @enderror
                        </div>


                    </div>

                    <div class="row mb-3">
                        <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea type="text-area" class="form-control" id="inputDescription" value=""
                                name="description">
                                {{ $post->description }}
                      </textarea>
                            @error('description')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}

                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>

                        <div class="col-sm-10">
                            <select class="form-select" id="inputStatus" name="status">
                                @foreach (config('setting.post_status') as $status)
                   
                                    <option {{$post->status == 'Publish' ? 'selected' : ''}}  value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                                {{-- <option {{ $post->status == 'Publish' ? 'selected' : '' }} value="Publish">Publish</option>
                                <option {{ $post->status == 'Draft' ? 'selected' : '' }} value="Draft">Draft</option> --}}
                            </select>
                            @error('status')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3"> 
                        <label for="formFile" class="col-sm-2 col-form-label">Old Image </label>
                        <div class="col-sm-10">
                            <img src="/storage/post_image/{{$post->post_image}}" width="100px" alt="">
                          </div>


                    </div>
                    

                    <div class="row mb-3"> 
                        <label for="formFile" class="col-sm-2 col-form-label">Select New image</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="post_image" type="file" id="formFile">
                          </div>
                          @error('status')
                          <div class="alert alert-danger" role="alert">
                              {{ $message }}

                          </div>
                      @enderror

                    </div>






                    <button type="submit" class="btn btn-outline-primary">Save Post</button>
                </form>
                <a type="submit" href="{{route('post.index')}}"  class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>

@endsection
