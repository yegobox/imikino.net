<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Comment;
use Auth;
use App\Journalist;
use DB;

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
        $posts = Post::where('author', '=', Auth::user()->name);
        $comments = Comment::all();
        $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
        return view('adminpages.journalist')->withPosts($posts)->withComments($comments)->withComs($commentss);
    }

    public function profile(){
        $user= Journalist::find(Auth::user()->id);
        $posts = Post::where('author', '=', Auth::user()->name);
        $comments = Comment::all();
        $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
        return view('reporterpages.profile', [
            'user' => $user,
            'posts' => $posts,
            'comments' => $comments,
            'coms' => $commentss
        ]);
    }

    public function profileUpdate(Request $request, $id){
        $this->validate($request, array(
            'name'          => 'required|max:255',
            'email'    => 'required|email',
            'phone'    => 'required|numeric|min:10',
            'job_title'           => 'required|max:255'
        ));

        DB::table('journalists')->where('id', $id)->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'job_title' => $request->job_title
            ]);

        $request->session()->flash('success', 'The blog post was successfully saved!');

        return redirect()->route('journalist.profile');
    }
}
