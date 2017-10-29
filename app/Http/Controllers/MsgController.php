<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class MsgController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $contact = Contact::orderBy('id', 'desc')->paginate(5);
        return view('adminpages.messages.index')->withComments($contact);
    }
}
