<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Contact;
use DB;

class MsgController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $comments = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
        $contact = Contact::orderBy('id', 'desc')->paginate(5);
        $notifications = Contact::where('readed', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('adminpages.messages.index',[
            'notifications' => $notifications
        ])->withComments($contact)->withComs($comments);
    }

    public function show($id){
        $message = Contact::find($id);
        DB::table('contacts')->where('id', $id)->increment('readed');
        $notifications = Contact::where('readed', '=', 0)->orderBy('created_at', 'desc')->get();
        $comments = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
        return view('adminpages.messages.show',[
            'message' => $message,
            'notifications' => $notifications,
            'coms' => $comments
        ]);
    }
}
