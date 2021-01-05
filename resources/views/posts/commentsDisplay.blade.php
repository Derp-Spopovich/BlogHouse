@foreach($comments as $comment)

    {{-- dispaying the comments and replies --}}
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <small class="float-right">{{$comment->created_at->diffForHumans()}}</small>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        {{-- end of displaying comments --}}

        @auth
        {{-- if user is logged in, he can reply. --}}
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="body" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
            </div>
        </form>
        @endauth
       
         {{-- delete comment --}}
         @if (Auth::user() && (Auth::user()->id == $comment->user_id))
         <form action="{{ route('comments.destroy', $comment->id) }}" method="post" class="float-none">
             @csrf
             @method('DELETE')
             <input type="submit" class="btn btn-sm btn-outline-danger py-0 " name="delete"  onclick="return confirm('Are you sure?')" value="delete">
         </form>
         @endif

        @include('posts.commentsDisplay', ['comments' => $comment->replies])
    </div>
    
@endforeach