@extends('layout.home')
@section('title', 'create ')

@section('content')

    <div class="container">
        <div class="row">
            <h1 class="display-1">Create Post</h1>
            <div class="col-md-12">

                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                @endif

                {{-- CREATE POST FORM  --}}

                <form method="post" action="{{ route('post.store') }}" class="border rounded p-3 m-3 shadow">
                    @csrf

                    <div class="row mb-3">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputTitle" value="{{ old('title') }}"
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
                            <textarea type="text-area" class="form-control" id="inputDescription"
                                value="{{ old('description') }}" name="description">
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
                                <option selected disabled>Choose...</option>
                                <option value="Publish">Publish</option>
                                <option value="Draft">Draft</option>


                            </select>
                            @error('status')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}

                                </div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline-primary">Save Post</button>
                </form>

                <a type="submit" href="{{route('post.index')}}"  class="btn btn-primary">Back</a>

            </div>
        </div>
    </div>

@endsection
