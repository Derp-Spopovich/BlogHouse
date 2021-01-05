@extends('layouts.app')
@section('content')

<div class="container py-4">
    <a href="{{ url()->previous() }}"><button type="button" class="btn btn-outline-dark">Go Back</button></a>
      <h1>Edit Blog</h1>
       <form method="POST" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data">
           @csrf
           @method('PUT')
          <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" value="{{$post->title}}">
              <small id="emailHelp" class="form-text text-muted">Create a beautiful blog!</small>
          </div>
          <div class="form-group">
          <label for="body">Body</label>
          <textarea class="form-control" id="editor" name="body">{{$post->title}}</textarea>
          </div>
          <div class="form-group">
            <label for="file">Upload Image :</label>
              <input type="file" name="cover_image">
        </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>


@endsection