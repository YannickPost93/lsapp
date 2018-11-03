@extends('layouts.app')

@section('content')
   
    
    <h1>Posts</h1>

    <form action="/search/" method="GET">
        <input type="text" class="form-control" name="s" value="{{ Request::query('s') }}" placeholder="Search this site..." />
    </form>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach ($categories as $category)
                <a class="dropdown-item" href="{{ route('category', $category->id) }}">{{$category->name}}<span class="badge pull-right">{{ $category->posts->count() }}</span></a>
            @endforeach  
        </div>
    </div>
        
            
    
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
