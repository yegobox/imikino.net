<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
use Session;
use Storage;

class searchController extends Controller
{
    
    public function index(Request $req){
        $posts = Post::where('title','like','%'.$req->search.'%')->get();
        return view('pages.search')->withPosts($posts);
    }

    public function getSearch(Request $req){
        $find = Post::where('title','like','%'.$req->search.'%')->paginate(5);
        $sames = DB::table('posts')->where('location_id', '=', $req->location_id)->limit(3)->get();
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $titles= DB::select('select * from posts order by id desc limit 5');
        return view('pages.search')->withPosts($find)->withAsides($aside)->withNewones($newone)->withSames($sames)->withTitles($titles);
    }
}
