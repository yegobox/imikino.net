<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Contact;

class MsgController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $comments = Comment::where('approved', '=', 0)->orderBy('id', 'desc');
        $contact = Contact::orderBy('id', 'desc')->paginate(5);
        return view('adminpages.messages.index')->withComments($contact)->withComs($comments);
    }
}
