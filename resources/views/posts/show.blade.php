@extends('layouts.app')
@section('content')

    <div class="container py-4">
        <a href="{{ url()->previous() }}"><button type="button" class="btn btn-outline-dark">Go Back</button></a>
        <h1 class="py-4">{{ucfirst($post->title)}}</h1>
        <div class="text-center">
            <img src="{{url('/cover_images/' .$post->cover_image)}}" alt="Image" style="width: 60%; height: 50%" class="img-thumbnail">
        </div>
        <br><br>
        <div>
            {{-- {{$post->body}} --}}
            {{-- to parse the html syntax using the ckeditor --}}
           <p> {!!$post->body!!}</p>
        </div>
        <hr>
        <small>created by <strong>{{ucwords($post->user->name)}}</strong></small>
        <hr>
        <small>Written on {{$post->created_at->format('M-d-Y')}}</small>
        <hr>
        @auth
        @if (Auth::user()->id == $post->user_id)
            <a href="{{route('posts.edit', $post->id)}}"><button type="button" class="btn btn-outline-info">Edit Blog</button></a>
            <div class="float-right">
            <form action="{{route('posts.destroy', $post->id)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" name="delete" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" value="Delete Blog">
            </form>
            </div>
     </div>
    @endif
    @endauth

    {{-- comment section --}}
    <div class="comments container py-5">
            
     <h5>Comments <small>{{$post->comments()->count()}}</small></h5>
    
     {{-- displaying the comments and reply --}}
     @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

    @auth
    {{-- if the user is logged in, he can leave a comment --}}
        <div class="card-body">
            <h5>Leave a comment</h5>
            <form method="post" action="{{ route('comments.store') }}">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="body"></textarea>
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Add Comment">
                </div>
        </div>
    </div>
    {{-- end of leave a comment --}}
     @endauth

     {{-- if the user is not logged in --}}
     @guest
     <div class="py-5 px-4">
     <a href="/login"><p>Login to comment</p></a>
    </div>
     @endguest

@endsection