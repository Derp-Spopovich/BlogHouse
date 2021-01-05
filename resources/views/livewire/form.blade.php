<div>
    <h1>Blogs</h1>

    <div class="d-flex justify-content-between">
        <a href="{{route('posts.create')}}" class="badge badge-pill badge-primary p-2">Create New Blog</a>
        <input wire:model="search" type="text" placeholder="Search forum by name...">
    </div>
   

    @forelse($posts as $post)
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
                        <img src="{{url('/cover_images/' .$post->cover_image)}}" alt="photo" class="bd-placeholder-img card-img-top img-thumbnail imgindex" style="width: 95%;">
                    </a>
                    {{-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg> --}}
                </div>
            </div>
        </div>
    @empty
        <p class="py-5 display-4">No Current Posts</p>
    @endforelse

    {{$posts->links()}}
</div>