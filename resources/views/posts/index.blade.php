@extends('layouts.app')
@section('content')
<div class="container py-4">
    {{-- for search function --}}
    <div>
        <div class="mx-auto float-right">
            <div class="">
                <form action="{{ route('posts.index') }}" method="GET" role="search">
                    <div class="input-group">
                        <a href="/posts"><svg width="5em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-repeat" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                          </svg></a>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search Blog By Title" id="term">
                        <span class="input-group-btn mr-5">
                        <button class="btn btn-outline-info" type="submit" title="Search Blog">
                            search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end of search --}}

    <h1>Blogs</h1>
    <a href="{{route('posts.create')}}" class="badge badge-pill badge-primary">Create New Blog</a>
  

    @if (count($posts) > 0)
    @foreach ($posts as $post)
    <div class="container marketing">
        <hr class="featurette-divider">
            <div class="row featurette">
                <div class="col-md-7 order-md-2 py-5">
                    <h2 class="featurette-heading">{{ucfirst($post->title)}}</h2>
                    <p class="lead">Created By: {{ucwords($post->user->name)}}</p>
                    <p class="lead">Date Created: {{$post->created_at->format('M-d-Y')}}</p>
                    <a href="{{route('posts.show', $post->id)}}"><button class="btn btn-outline-info">View Blog</button>
                </div>
                    <div class="col-md-5">
                        {{-- <img src="{{url('/images/myimage.jpg')}} --}}
                        <img src="{{url('/cover_images/' .$post->cover_image)}}" alt="photo" class="bd-placeholder-img card-img-top img-thumbnail imgindex" style="width: 95%;">
                    </a>
                    {{-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg> --}}
                </div>
            </div>
    </div>

   
    @endforeach
    <div class="py-5 mx-4">
        {{$posts->links()}}
    </div>

    @else
    <p class="py-5">There are no blogs</p>
    @endif
   
  

</div>
@endsection