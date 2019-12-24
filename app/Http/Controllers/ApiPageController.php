<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Post;
use App\Livescore;
use App\Rating;
use App\Tag;
use DB;
use Purifier;
use App\Live;

class ApiPageController extends Controller
{
    public function getAll() {
        $lists = Post::orderBy('created_at', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles fetched successfully',
            'data' => $lists
        ]);
    }

    public function getRwanda()
    {
        $posts = Post::where(['location_id' => 2])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles from Rwanda as location fetched successfully',
            'data' => $posts
        ]);
    }

    public function getAfrica()
    {
        $posts = Post::where(['location_id' => 3])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles from Africa as location fetched successfully',
            'data' => $posts
        ]);
    }

    public function getEngland()
    {
        $posts = Post::where(['location_id' => 4])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles from England as location fetched successfully',
            'data' => $posts
        ]);
    }

    public function getSpain()
    {
        $posts = Post::where(['location_id' => 6])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles from Spain as location fetched successfully',
            'data' => $posts
        ]);
    }

    public function getFrance()
    {
        $posts = Post::where(['location_id' => 5])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles from France as location fetched successfully',
            'data' => $posts
        ]);
    }

    public function getItaly()
    {
        $posts = Post::where(['location_id' => 7])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles from Italy as location fetched successfully',
            'data' => $posts
        ]);
    }

    public function getGermany()
    {
        $posts = Post::where(['location_id' => 8])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles from Germany as location fetched successfully',
            'data' => $posts
        ]);
    }

    public function getAmerica()
    {
        $posts = Post::where(['location_id' => 9])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles from America as location fetched successfully',
            'data' => $posts
        ]);
    }

    public function getAsia()
    {
        $posts = Post::where(['location_id' => 10])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles from Asia as location fetched successfully',
            'data' => $posts
        ]);
    }

    public function getOther()
    {
        $posts = Post::where(['location_id' => 11])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles of other categories fetched successfully',
            'data' => $posts
        ]);
    }

    public function getBasketball()
    {
        $posts = Post::where(['sport_id' => 3])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles of Basketball as category fetched successfully',
            'data' => $posts
        ]);
    }

    public function getFootball()
    {
        $posts = Post::where(['sport_id' => 1])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles of Football as category fetched successfully',
            'data' => $posts
        ]);
    }

    public function getVolleyball()
    {
        $posts = Post::where(['sport_id' => 2])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles of Volleyball as category fetched successfully',
            'data' => $posts
        ]);
    }

    public function getRugby()
    {
        $posts = Post::where(['sport_id' => 4])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles of Rugby as category fetched successfully',
            'data' => $posts
        ]);
    }

    public function getHandball()
    {
        $posts = Post::where(['sport_id' => 5])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles of Handball as category fetched successfully',
            'data' => $posts
        ]);
    }

    public function getSwimming()
    {
        $posts = Post::where(['sport_id' => 6])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles of Swimming as category fetched successfully',
            'data' => $posts
        ]);
    }

    public function getCricket()
    {
        $posts = Post::where(['sport_id' => 7])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles of Cricket as category fetched successfully',
            'data' => $posts
        ]);
    }

    public function getCycling()
    {
        $posts = Post::where(['sport_id' => 8])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles of Cycling as category fetched successfully',
            'data' => $posts
        ]);
    }

    public function getAthletic()
    {
        $posts = Post::where(['sport_id' => 9])->orderBy('id', 'desc')->take(100)->get();
        return response()->json([
            'message' => 'Articles of Athletic as category fetched successfully',
            'data' => $posts
        ]);
    }

    public function getSingle($slug) {
        $post = Post::where('slug', '=', $slug)->first();
        $sames = Post::where([
            'location_id' => $post->location->id,
            'sport_id' => $post->sport->id
            ])->whereNotIn('id', [$post->id])->limit(3)->get();
        return response()->json([
            'message' => 'Article fetched successfully',
            'data' => ['post' => $post, 'comments' => $post->comments , 'same' => $sames]
        ]);
    }
}
