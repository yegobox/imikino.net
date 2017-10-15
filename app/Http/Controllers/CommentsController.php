<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\Post;
use Session;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('id', 'desc')->paginate(5);
        return view('adminpages.comments.index')->withComments($comments);
    }
    public function store(Request $request, $post_id)
    {
        $this->validate($request, array(
            'name' => 'required|max:255',
            'email'=> 'required|email|max:255',
            'phone' => 'required|digits_between:10,13',
            'comment'=> 'required|min:5|max:2000'
        ));

        $post = Post::find($post_id);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->phone = $request->phone;
        $comment->comment = $request->comment;
        $comment->approved = false;
        $comment->post()->associate($post);

        $comment->save();

        
        $request->session()->flash('success', 'Comment was added.');

        return redirect()->route('single', [$post->slug]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('adminpages.comments.edit')->withComment($comment);
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
        $comment = Comment::find($id);

        $this->validate($request, array(
            'comment' => 'required'
        ));

        $comment->comment = $request->comment;
        $comment->save();

        $request->session()->flash('success', 'Comment was updated.');

        return redirect()->route('posts.show', $comment->post->id);
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        return view('adminpages.comments.delete')->withComment($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment->delete();

        Session::flash('success', 'Deleted Comment');

        return redirect()-> route('posts.show', $post_id);
    }
}
