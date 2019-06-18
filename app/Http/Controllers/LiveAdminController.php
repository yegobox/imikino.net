<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Session;
use App\Contact;
use App\Comment;
use DB;
use App\Live;

class LiveAdminController extends Controller
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

    public function index()
    {
        $posts = Live::orderBy('id', 'desc')->paginate(5);
        $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
        $notifications = Contact::where('readed', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('adminpages.lives.index',[
            'notifications' => $notifications,
        ])->withPosts($posts)->withComs($commentss);
    }

    public function show($id)
    {
        $post = Live::find($id);
        $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
        $notifications = Contact::where('readed', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('adminpages.lives.show', [
            'notifications' => $notifications,
        ])->withPost($post)->withComs($commentss);
    }

    public function destroy($id)
    {
        $post = Live::find($id);
        $post->tags()->detach();
        //Storage::delete($post->image);

        $post->delete();

        
        Session::flash('success', 'The post was successfully deleted.');
        

        return redirect()->route('admin_livestream.index');
    }

    public function postApprove($id)
    {
        $comment = Live::find($id);
        if($comment){
            $comment->approved = 1;
            $comment->save();
            DB::table('lives')->whereNotIN('id', [$id])->update(['approved' => 0]);
            return redirect()->back()->with('success', 'Comment approved');
        }
        
    }
    public function postDisapprove($id)
    {
        $comment = Live::find($id);
        if($comment){
            $comment->approved = 0;
            $comment->save();
            return redirect()->back()->with('success', 'Comment disapproved');
        }
        
    }
}
