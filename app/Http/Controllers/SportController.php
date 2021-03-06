<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sport;
use App\Comment;
use App\Contact;

class SportController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         // display a view of all of our categories
         // it will also have a form to create a new category
 
         $sports = Sport::all();
         $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
         $notifications = Contact::where('readed', '=', 0)->orderBy('created_at', 'desc')->get();
         
                 return view('adminpages.sports.index',[
                     'notifications' => $notifications
                 ])->withSports($sports)->withComs($commentss);
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
        // Save a new category and then redirect back to index
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));

        $sport = new Sport;

        $sport->name = $request->name;
        $sport->save();

        
        $request->session()->flash('success', 'New Sport Category has been created');

        return redirect()->route('sports.index');
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
}
