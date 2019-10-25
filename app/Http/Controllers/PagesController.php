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

class PagesController extends Controller
{
    public function getTags($id)
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(20)->get();
        $tag = Tag::find($id);
        //$tags = $tag->posts()->paginate(5);
        return view('pages.tag')->withTag($tag)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getFooter()
    {
        // require_once('Net/Geo.php');
        $net_geo = new Net_Geo();

        $ip = $_SERVER['REMOTE_ADDR'];

        $results = $net_geo->getRecord($ip);

        dd($results);
    }

    public function getIndex()
    {
        $titles = DB::table('posts')->select('title', 'slug')->where('approved', '=', true)->orderBy('id', 'desc')->limit(5)->get();
        $tags = DB::table('tags')->orderBy('id', 'desc')->inRandomOrder()->limit(10)->get();
        $first = DB::table('posts')->where('approved', '=', true)->orderBy('id', 'desc')->limit(1)->get();
        $other = DB::table('posts')->where('approved', '=', true)->orderBy('id', 'desc')->skip(1)->take(4)->get();
        $lists = POST::orderBy('created_at', 'desc')->paginate(20);
        //$list = DB::select('select * from posts order by id desc limit 0,20');
        $imgs1 = DB::table('posts')->select('image', 'slug')->where('approved', '=', true)->orderBy('id', 'desc')->limit(2)->get();
        $imgs2 = DB::table('posts')->select('image', 'slug')->where('approved', '=', true)->orderBy('id', 'desc')->skip(2)->take(2)->get();
        $imgs3 = DB::table('posts')->select('image', 'slug')->where('approved', '=', true)->orderBy('id', 'desc')->skip(4)->take(2)->get();
        $imgs4 = DB::table('posts')->select('image', 'slug')->where('approved', '=', true)->orderBy('id', 'desc')->skip(6)->take(2)->get();
        $imgs5 = DB::table('posts')->select('image', 'slug')->where('approved', '=', true)->orderBy('id', 'desc')->skip(8)->take(2)->get();
        $live = Live::where('approved', '=', 1)->first();
        $livescores = Livescore::orderBy('time', 'desc')->take(3)->get();
        $ratings = Rating::orderBy('points', 'desc')->take(20)->get();
        $aside = DB::table('posts')->where('views', '>=', 1000)->where('approved', '=', true)->orderBy('views', 'desc')->inRandomOrder()->limit(5)->get();
        //$posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        return view('pages.home', [
            'live' => $live,
            'ratings' => $ratings,
            'livescores' => $livescores
        ])->withOthers($other)->withFirsts($first)->withLists($lists)->withImgs1($imgs1)->withImgs2($imgs2)->withImgs3($imgs3)->withImgs4($imgs4)->withImgs5($imgs5)->withAsides($aside)->withTags($tags)->withTitles($titles);
    }

    public function getRwanda()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['location_id' => 2, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.rwanda')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getAfrica()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['location_id' => 3, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.africa')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getEngland()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['location_id' => 4, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.england')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getSpain()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['location_id' => 6, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.spain')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getFrance()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['location_id' => 5, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.france')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getItaly()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['location_id' => 7, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.italy')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getGermany()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['location_id' => 8, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.germany')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getAmerica()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['location_id' => 9, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.america')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getAsia()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['location_id' => 10, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.asia')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getOther()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['location_id' => 11, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.other')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getBasketball()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['sport_id' => 3, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.basketball')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getFootball()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['sport_id' => 1, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.football')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getVolleyball()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['sport_id' => 2, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.volleyball')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getRugby()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['sport_id' => 4, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.rugby')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getHandball()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['sport_id' => 5, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.handball')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getSwimming()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['sport_id' => 6, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.swimming')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getCricket()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['sport_id' => 7, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.cricket')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getCycling()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['sport_id' => 8, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.cycling')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getAthletic()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['sport_id' => 9, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.athletic')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getVideos()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where(['sport_id' => 8, 'approved' => true])->orderBy('id', 'desc')->paginate(10);
        return view('pages.videos')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getContact()
    {
        $titles = DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->inRandomOrder()->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        return view('pages.contact')->withTitles($titles)->withAsides($aside)->withNewones($newone);
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'phone' => 'required|digits_between:10,20',
            'message' => 'min:10'
        ]);

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->counter = '0';
        $contact->readed = '0';
        $contact->message = Purifier::clean($request->message);

        $contact->save();

        /*Mail::send('auth.emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('hello@jayjay.com');
            $message->subject($data['subject']);
        });*/

        $request->session()->flash('success', 'Ikifuzo cyawe cyakiriwe. Murakoze');

        return redirect()->route('contact');
    }
}
