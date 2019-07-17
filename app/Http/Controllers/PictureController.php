<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Image;
use Auth;
use App\Picture;
use App\Post;
use App\Comment;

class PictureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:journalist');
    }

    public function index()
    {
        $pictures = Picture::orderBy('id', 'desc')->paginate(15);
        $posts = Post::where('author', '=', Auth::user()->name)->orderBy('id', 'desc')->paginate(5);
        $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
        return view('reporterpages.pictures.index', [
            'pictures' => $pictures
        ])->withPosts($posts)->withComs($commentss);
    }

    public function create(){
        $posts = Post::where('author', '=', Auth::user()->name)->orderBy('id', 'desc')->paginate(5);
        $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
        return view('reporterpages.pictures.create')->withPosts($posts)->withComs($commentss);
    }

    public function save(Request $request){
        $pic = new Picture;
        $this->validate($request, array(
            'image' => 'required|image',
        ));

        if($request->hasFile('image')) {
            $image5 = $request->file('image');
            $filename = time() . '.' . $image5->getClientOriginalExtension();
            $location = public_path('images/news/' . $filename);
            //or $filename = time() . '.' . $image->encode('png');
            //$location = public_path('images/news/');
            //or $location = storage_path('/app/posts/');
            //$image->move($location, $filename);
            Image::make($image5)->resize(1366, 768)->save($location);

            $pic->image = $filename;
        }

        $pic->reporter = Auth::user()->name;
        $pic->used = "Not yet";

        $pic->save();
        
        $request->session()->flash('success', 'Your picture was successfully saved!');
        
        // redirect to another page
        
        return redirect()->route('journalist.picture');
    }
} 
