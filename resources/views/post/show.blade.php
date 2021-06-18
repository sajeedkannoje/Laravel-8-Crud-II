@extends('layout.home')
@section('title' ,'Show ')

@section('content')


<div class="container">
    <a type="submit" href="{{route('post.index')}}"  class="btn btn-primary my-3">Back</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card align-content-center mb-5 " >
              <img src="{{url('/storage/post_image')."/" .$post->post_image }}" class="card-img-top align-self-center"  style="width: 70%"  alt="...">
              <div class="card-body">
                <h5 class="card-title display-5">{{$post->title}}</h5>
               
                <p class="card-text">{{$post->description}}</p>
            
              </div>

              <div class=" row card-footer">
                  <p class="col-md-2" >Status-</p>
         
                <button class="col-md-5  btn   {{$post->status == config('setting.post_status')[$post->status] ? 'btn-danger' : 'btn-success'  }}" > {{config('setting.post_status')[$post->status]}}</button>
           
              </div>



            </div> 
        </div>
    </div>
</div>



    
@endsection