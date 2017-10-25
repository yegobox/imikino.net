<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Location;
use App\Sport;
use App\Tag;
use Purifier;
use Session;
use Image;
use Storage;

class PostController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('adminpages.posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Tag
        $tags = Tag::all();
        $sports = Sport::all();

        $locations = Location::all();
        return view('adminpages.posts.create')->withSports($sports)->withLocations($locations)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'title'          => 'required|max:255',
            'slug'           => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'sport_id'    => 'required|integer',
            'location_id'    => 'required|integer',
            'body'           => 'required',
            'featured_image' => 'sometimes|image',
            'author' => 'required'
        ));

        // store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->author= $request->author;
        $post->views = 0;
        $post->sport_id = $request->sport_id;
        $post->location_id = $request->location_id;
        $post->body = Purifier::clean($request->body);

        //save our image
        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //or $filename = time() . '.' . $image->encode('png');
            $location = public_path('images/news/' . $filename);
            //or $location = storage_path('/app/posts/');
            $image->move($location, $filename);
            //Image::make($image)->resize(1366, 768)->save($location);

            $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);
        
        $request->session()->flash('success', 'The blog post was successfully saved!');
        
        // redirect to another page
        
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('adminpages.posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $sports = Sport::all();
        $sports2 = array();
        foreach($sports as $sport) {
            $sports2[$sport->id] = $sport->name;
        }
        $locations = Location::all();
        $locations2 = array();
        foreach($locations as $location) {
            $locations2[$location->id] = $location->name;
        }
        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        return view('adminpages.posts.edit')->withPost($post)->withLocations($locations2)->withSports($sports2)->withTags($tags2);
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
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title'          => 'required|max:255',
                'sport_id'    => 'required|integer',
                'location_id'    => 'required|integer',
                'body'           => 'required',
                'featured_image' => 'sometimes|image',
                'author' => 'required' 
            ));
        }else{
            $this->validate($request, array(
                'title'          => 'required|max:255',
                'slug'           => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'sport_id'    => 'required|integer',
                'location_id'    => 'required|integer',
                'body'           => 'required',
                'featured_image' => 'sometimes|image',
                'author' => 'required' 
            ));
        }

        if ($request->hasFile('featured_image')) {
            // add the new photo
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/news/' . $filename);
            Image::make($image)->resize(1366, 768)->save($location);
            $oldFilename = $post->image;
            // update the database
            $post->image = $filename;
            // Delete the old photo
            Storage::delete($oldFilename);
        }

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->sport_id = $request->sport_id;
        $post->author = $request->author;
        $post->location_id = $request->location_id;
        $post->body = Purifier::clean($request->body);

        if (isset($request->tags)) {
            $post->tags()->sync($request->tags, true);
        } else {
            $post->tags()->sync(array(), true);
        }

        $post->save();

        // Set flash data with success message
        $request->session()->flash('success', 'The blog post was successfully saved!');
        
        // Redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        //Storage::delete($post->image);

        $post->delete();

        
        Session::flash('success', 'The post was successfully deleted.');
        

        return redirect()->route('posts.index');
    }
}
