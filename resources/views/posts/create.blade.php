@extends('layouts.app')
@section('content')

    <div class="container py-4">
      <a href="/posts"><button type="button" class="btn btn-outline-dark">Go Back</button></a>
        <h1>Create Blog</h1>
         <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
             @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" placeholder="title">
                <small class="form-text text-muted">Create a beautiful blog!</small>
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                  <textarea name="body" id="editor" placeholder="body"></textarea>
            </div>
            <div class="form-group">
                <label for="file">Upload Image :</label>
                  <input type="file" name="cover_image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection