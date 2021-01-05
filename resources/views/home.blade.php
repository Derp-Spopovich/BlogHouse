@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Your Blog Posts</h3>
                    <a href="/posts/create">Create New Blog</a>
                    {{-- after nmo ma connect ang duha ka model(user model and post model), pwede na nmo e display diri ang result sa home view, para mkit,an sa user kng unsa ilang nabuhat na post. --}}
                    @if (count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <td>Title</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/posts/{{$post->id}}" class="btn btn-outline-dark">View</a></td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-info">Edit</a></td>
                                <td>
                                    <form action="{{route('posts.destroy', $post->id)}}" method="post" class="float-right">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete Blog" name="delete" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger ">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @else
                        <p>You have no blog posted yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
