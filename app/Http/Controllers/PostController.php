<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    //authorization dli ka access ang guest sa uban feature sa website
    // public function __construct() {
    //     $this->middleware('auth')->except('index', 'show');
    // } transfered the authentication method in the routes
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //show the created blogs order by date created
        // $posts = Post::orderBy('created_at', 'desc')->simplePaginate(5);
        // return \view('posts.index')->with('posts', $posts);

        //for search function
        // $posts = Post::where([
        //     ['title', '!=', Null],
        //     [function ($query) use ($request) {
        //         if (($term = $request->term)) {
        //             $query->orWhere('title', 'LIKE', '%' . $term . '%')->get();
        //         }
        //     }]
        // ])
        // ->orderBy('created_at', 'desc')->simplePaginate(5);

        // return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation para sa create
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //handle file upload
        if ($request->hasFile('cover_image')) {
            //Get file with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store to make it unique para d ma delete if naay kaparihas ngan ang e upload
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload image to public directory
            $path = $request->file('cover_image')->move(public_path('/cover_images'), $fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }

        //if the validation is passed, proceed in saving the data to db
        $post = New Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id; //e connect ang post->user_id sa user->id
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Added');
    }

    /**
     * Display the specified resource.  
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show a single blog
        $post = Post::findOrFail($id);
        return \view('/posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //pangitaon sa ang id sa edit 
        $post = Post::findOrFail($id);

        //kung ang user mu type ug diritso sa URL ug edit na d niya gibuhat ang post, balik sa index with error msg
        if (Auth()->user()->id !== $post->user_id) {
        return \redirect('/posts')->with('error', 'You cant do that');
         }
        
        return \view('/posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate for updating
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //handle file upload 
        if ($request->hasFile('cover_image')) {
            //Get file with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store to make it unique para d ma delete if naay kaparihas ngan ang e upload
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->move(public_path('/cover_images'), $fileNameToStore);
        }

        //if validation is passed, proceed in saving the data in db
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($request->hasFile('cover_image')) { 
            if ($post->cover_image != 'noimage.jpg') {
                File::delete(public_path('cover_images/'. $post->cover_image)); //delete the file if the user has updated it
            }
            $post->cover_image = $fileNameToStore;

        }
        $post->save();

        return redirect('/posts')->with('success', 'Blog Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response    
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        //kung ang user mu type ug diritso sa URL ug edit na d niya gibuhat ang post, balik sa index with error msg
        if (Auth()->user()->id !== $post->user_id) {
            return \redirect('/posts')->with('error', 'You cant do that');
        }

         //d ta gananhan ma delete ang "no_image"
         if ($post->cover_image != 'noimage.jpg') {
            //delete image
            File::delete(public_path('cover_images/'. $post->cover_image));
        }


        $post->delete();
        return \redirect('/posts')->with('success', 'Blog Deleted');
    }
}
