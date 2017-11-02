<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Comment;
=======
>>>>>>> 03df574d3738ac3eef58dea22a8fe9afdda664c8
use App\Contact;

class MsgController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
<<<<<<< HEAD
        $comments = Comment::where('approved', '=', 0)->orderBy('id', 'desc');
        $contact = Contact::orderBy('id', 'desc')->paginate(5);
        return view('adminpages.messages.index')->withComments($contact)->withComs($comments);
=======
        $contact = Contact::orderBy('id', 'desc')->paginate(5);
        return view('adminpages.messages.index')->withComments($contact);
>>>>>>> 03df574d3738ac3eef58dea22a8fe9afdda664c8
    }
}
