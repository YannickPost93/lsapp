@section('title')
	| Search on {{ $s }}
@endsection

@extends('layouts.app')

@section('content')

    <h1>Posts</h1>

    <div class="blog-header">
		<h1 class="blog-title">Searching for "{{ $s }}"</h1>
		<p>We've found {{ $posts->count() }} results for your search term in all blog entries</p>
	</div>

    <form action="/search/" method="GET">
        <input type="text" class="form-control" name="s" value="{{ Request::query('s') }}" placeholder="Search this site..." />
    </form>
    
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

        <p>No post martch on your term <strong>{{ $s }}</strong></p>

    @endif
               
@endsection