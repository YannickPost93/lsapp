@extends('layouts.app')

@section('content')
   
    
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card float-left m-1" style="width: 18rem;">
                <img class="card-img-top" src="/storage/cover_images/{{$post->cover_image}}" alt="Card image cap">
                <div class="card-body">   
                    <h3 class="card-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>        
                    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else 
        <p>No Posts Found</p>
    @endif
               
@endsection
