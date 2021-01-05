<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //e match ang post->user_id sa users->id
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        return view('home')->with('posts', $user->posts);
    }
}
