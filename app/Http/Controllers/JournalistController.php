<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Post;

//use App\Comment;

class JournalistController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:journalist');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        //$comments = Comment::all();
        return view('adminpages.journalist')/*->withPosts($posts)->withComments($comments)*/;
    }
}
