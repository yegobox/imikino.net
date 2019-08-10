<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Location;
use App\Sport;
use Auth;
use App\Tag;
use App\Comment;
use Purifier;
use Session;
use Image;
use Storage;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:journalist');
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(20);
        $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
        return view('reporterpages.posts.index')->withPosts($posts)->withComs($commentss);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getApprove($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->approved = true;
            $post->save();
            return redirect()->back()->with('success', "The post <b>$post->title</b> written by <b>$post->author</b> was approved");
        }
    }
    public function getDisapprove($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->approved = false;
            $post->save();
            return redirect()->back()->with('disaproved', "The post <b>$post->title</b> written by <b>$post->author</b> was disapproved");
        }
    }
}
