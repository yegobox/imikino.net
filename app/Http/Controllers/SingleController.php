<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use DB;

class SingleController extends Controller
{
    public function getSingle($slug) {
        DB::table('posts')->where('slug', $slug)->increment('views');
        $post = Post::where('slug', '=', $slug)->first();
        $sames = Post::where('location_id', $post->location->id)->limit(3)->get();
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $titles= DB::select('select * from posts order by id desc limit 5');
        return view('pages.single')->withPost($post)->withAsides($aside)->withNewones($newone)->withSames($sames)->withTitles($titles);
    }
}
