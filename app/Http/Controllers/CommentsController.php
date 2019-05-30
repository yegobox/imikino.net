<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\Post;
use App\Contact;
use Session;
use DB;

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

        $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
        $comments = Comment::orderBy('id', 'desc')->paginate(5);
        $notifications = Contact::where('readed', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('adminpages.comments.index',[
            'notifications' => $notifications
        ])->withComments($comments)->withComs($commentss);
    }

    public function postApprove($id)
    {
        $comment = Comment::find($id);
        if($comment){
            $comment->approved = 1;
            $comment->save();
            return redirect()->back()->with('success', 'Comment approved');
        }
        
    }
    public function postDisapprove($id)
    {
        $comment = Comment::find($id);
        if($comment){
            $comment->approved = 0;
            $comment->save();
            return redirect()->back()->with('success', 'Comment approved');
        }
        
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
        $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
        $notifications = Contact::where('readed', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('adminpages.comments.edit',[
            'notifications' => $notifications,
            'comment' => $comment
        ])->withComs($commentss);
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
        $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
        $notifications = Contact::where('readed', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('adminpages.comments.delete',[
            'notifications' => $notifications
        ])->withComment($comment)->withComs($commentss);
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

    public function show($id){
        $comment = Comment::find($id);
        $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
        $notifications = Contact::where('readed', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('adminpages.comments.show',[
            'notifications' => $notifications
        ])->withComment($comment)->withComs($commentss);
    }
}
