<?php

namespace App\Http\Controllers;
use App\Post;
use App\Location;
use App\Sport;
use App\Tag;
use App\Comment;
use Purifier;
use Session;
use Image;
use Storage;
use App\Contact;
use App\Live;
use Auth;
use DB;

use Illuminate\Http\Request;

class LiveStreamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:journalist');
    }

    public function index()
    {
        
        $posts = Live::where('author', '=', Auth::user()->name)->orderBy('id', 'desc')->paginate(5);
        $comments = Comment::all();
        $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
        return view('reporterpages.lives.index')->withPosts($posts)->withComments($comments)->withComs($commentss);
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
        $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();

        $locations = Location::all();
        return view('reporterpages.lives.create')->withSports($sports)->withLocations($locations)->withTags($tags)->withComs($commentss);
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
            'featured_image' => 'required|image',
            'image1' => 'sometimes|image',
            'image2' => 'sometimes|image',
            'image3' => 'sometimes|image',
            'image4' => 'sometimes|image',
            'image5' => 'sometimes|image',
            'image1_txt'          => 'sometimes|max:255',
            'image2_txt'          => 'sometimes|max:255',
            'image3_txt'          => 'sometimes|max:255',
            'image4_txt'          => 'sometimes|max:255',
            'image5_txt'          => 'sometimes|max:255',
            'author' => 'required'
        ));

        // store in the database
        $post = new Live;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->author= $request->author;
        $post->views = 0;
        $post->sport_id = $request->sport_id;
        $post->location_id = $request->location_id;
        $post->body = Purifier::clean($request->body);
        $post->image1_txt = $request->image1_txt;
        $post->image2_txt = $request->image2_txt;
        $post->image3_txt = $request->image3_txt;
        $post->image4_txt = $request->image4_txt;
        $post->image5_txt = $request->image5_txt;

        //save our image
        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/news/' . $filename);
            //or $filename = time() . '.' . $image->encode('png');
            //$location = public_path('images/news/');
            //or $location = storage_path('/app/posts/');
            //$image->move($location, $filename);
            Image::make($image)->resize(1366, 768)->save($location);

            $post->image = $filename;
        }

        //save our image 1
        if($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $filename = time() . '.' . $image1->getClientOriginalExtension();
            $location = public_path('images/news/image1' . $filename);
            //or $filename = time() . '.' . $image->encode('png');
            //$location = public_path('images/news/');
            //or $location = storage_path('/app/posts/');
            //$image->move($location, $filename);
            Image::make($image1)->resize(1366, 768)->save($location);

            $post->image1 = $filename;
        }

        //save our image 2
        if($request->hasFile('image2')) {
            $image2 = $request->file('image1');
            $filename = time() . '.' . $image2->getClientOriginalExtension();
            $location = public_path('images/news/image2' . $filename);
            //or $filename = time() . '.' . $image->encode('png');
            //$location = public_path('images/news/');
            //or $location = storage_path('/app/posts/');
            //$image->move($location, $filename);
            Image::make($image2)->resize(1366, 768)->save($location);

            $post->image2 = $filename;
        }

        //save our image 3
        if($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $filename = time() . '.' . $image3->getClientOriginalExtension();
            $location = public_path('images/news/image3' . $filename);
            //or $filename = time() . '.' . $image->encode('png');
            //$location = public_path('images/news/');
            //or $location = storage_path('/app/posts/');
            //$image->move($location, $filename);
            Image::make($image3)->resize(1366, 768)->save($location);

            $post->image3 = $filename;
        }

        //save our image 4
        if($request->hasFile('image4')) {
            $image4 = $request->file('image4');
            $filename = time() . '.' . $image4->getClientOriginalExtension();
            $location = public_path('images/news/image4' . $filename);
            //or $filename = time() . '.' . $image->encode('png');
            //$location = public_path('images/news/');
            //or $location = storage_path('/app/posts/');
            //$image->move($location, $filename);
            Image::make($image4)->resize(1366, 768)->save($location);

            $post->image4 = $filename;
        }

        //save our image 5
        if($request->hasFile('image5')) {
            $image5 = $request->file('image5');
            $filename = time() . '.' . $image5->getClientOriginalExtension();
            $location = public_path('images/news/image5' . $filename);
            //or $filename = time() . '.' . $image->encode('png');
            //$location = public_path('images/news/');
            //or $location = storage_path('/app/posts/');
            //$image->move($location, $filename);
            Image::make($image5)->resize(1366, 768)->save($location);

            $post->image5 = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);
        
        $request->session()->flash('success', 'The blog post was successfully saved!');
        
        // redirect to another page
        
        return redirect()->route('livestream.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Live::find($id);
        $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
        return view('reporterpages.lives.show')->withPost($post)->withComs($commentss);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Live::find($id);
        $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
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
        return view('reporterpages.lives.edit')->withPost($post)->withLocations($locations2)->withSports($sports2)->withTags($tags2)->withComs($commentss);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {$post = Live::find($id);
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
            //$image->move($location, $filename);
            $oldFilename = $post->image;
            // update the database
            $post->image = $filename;
            // Delete the old photo
            Storage::delete($oldFilename);
        }

        //save our image 1
        if($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $filename = time() . '.' . $image1->getClientOriginalExtension();
            $location = public_path('images/news/image1' . $filename);
            //or $filename = time() . '.' . $image->encode('png');
            //$location = public_path('images/news/');
            //or $location = storage_path('/app/posts/');
            //$image->move($location, $filename);
            Image::make($image1)->resize(1366, 768)->save($location);

            $post->image1 = $filename;
        }

        //save our image 2
        if($request->hasFile('image2')) {
            $image2 = $request->file('image1');
            $filename = time() . '.' . $image2->getClientOriginalExtension();
            $location = public_path('images/news/image2' . $filename);
            //or $filename = time() . '.' . $image->encode('png');
            //$location = public_path('images/news/');
            //or $location = storage_path('/app/posts/');
            //$image->move($location, $filename);
            Image::make($image2)->resize(1366, 768)->save($location);

            $post->image2 = $filename;
        }

        //save our image 3
        if($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $filename = time() . '.' . $image3->getClientOriginalExtension();
            $location = public_path('images/news/image3' . $filename);
            //or $filename = time() . '.' . $image->encode('png');
            //$location = public_path('images/news/');
            //or $location = storage_path('/app/posts/');
            //$image->move($location, $filename);
            Image::make($image3)->resize(1366, 768)->save($location);

            $post->image3 = $filename;
        }

        //save our image 4
        if($request->hasFile('image4')) {
            $image4 = $request->file('image4');
            $filename = time() . '.' . $image4->getClientOriginalExtension();
            $location = public_path('images/news/image4' . $filename);
            //or $filename = time() . '.' . $image->encode('png');
            //$location = public_path('images/news/');
            //or $location = storage_path('/app/posts/');
            //$image->move($location, $filename);
            Image::make($image4)->resize(1366, 768)->save($location);

            $post->image4 = $filename;
        }

        //save our image 5
        if($request->hasFile('image5')) {
            $image5 = $request->file('image5');
            $filename = time() . '.' . $image5->getClientOriginalExtension();
            $location = public_path('images/news/image5' . $filename);
            //or $filename = time() . '.' . $image->encode('png');
            //$location = public_path('images/news/');
            //or $location = storage_path('/app/posts/');
            //$image->move($location, $filename);
            Image::make($image5)->resize(1366, 768)->save($location);

            $post->image5 = $filename;
        }

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->sport_id = $request->sport_id;
        $post->author = $request->author;
        $post->location_id = $request->location_id;
        $post->body = Purifier::clean($request->body);
        // $post->image1_txt = $request->image1_txt;
        // $post->image2_txt = $request->image2_txt;
        // $post->image3_txt = $request->image3_txt;
        // $post->image4_txt = $request->image4_txt;
        // $post->image5_txt = $request->image5_txt;

        if (isset($request->tags)) {
            $post->tags()->sync($request->tags, true);
        } else {
            $post->tags()->sync(array(), true);
        }

        $post->save();

        // Set flash data with success message
        $request->session()->flash('success', 'The blog post was successfully saved!');
        
        // Redirect with flash data to posts.show
        return redirect()->route('livestream.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Live::find($id);
        $post->tags()->detach();
        //Storage::delete($post->image);

        $post->delete();

        
        Session::flash('success', 'The post was successfully deleted.');
        

        return redirect()->route('livestream.index');
    }
}
