<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Contact;
use App\Comment;
use App\Live;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
        $comments = Comment::all();
        $lives = Live::all();
        $notifications = Contact::where('readed', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('adminpages.index',[
            'notifications' => $notifications,
            'lives' => $lives
        ])->withPosts($posts)->withComments($comments)->withComs($commentss);
    }
}
