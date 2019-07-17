<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Post;
use App\Location;
use App\Sport;
use App\Tag;
use Mail;
use DB;
use Purifier;
use App\Live;

class PagesController extends Controller
{
    public function getTags($id)
    {
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $tag = Tag::find($id);
        //$tags = $tag->posts()->paginate(5);
        return view('pages.tag')->withTag($tag)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }
    
    public function getFooter(){
        $footer = DB::select('select title from posts order by id desc limit 5');
        return view('partials._footer')->withFooters($footer);
    }

    public function getIndex(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $tags = DB::select('select * from tags order by id desc limit 0,5');
        $first = DB::select('select * from posts order by id desc limit 0,1');
        $other = DB::select('select * from posts order by id desc limit 1,4');
        $lists = POST::orderBy('created_at', 'desc')->paginate(20);
        //$list = DB::select('select * from posts order by id desc limit 0,20');
        $imgs1 = DB::select('select image,slug from posts order by id desc limit 0,2');
        $imgs2 = DB::select('select image,slug from posts order by id desc limit 2,2');
        $imgs3 = DB::select('select image,slug from posts order by id desc limit 4,2');
        $imgs4 = DB::select('select image,slug from posts order by id desc limit 6,2');
        $imgs5 = DB::select('select image,slug from posts order by id desc limit 8,2');
        $live = Live::where('approved', '=', 1)->first();
        $aside = DB::table('posts')->where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        //$posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        return view('pages.home', [
            'live' => $live
        ])->withOthers($other)->withFirsts($first)->withLists($lists)->withImgs1($imgs1)->withImgs2($imgs2)->withImgs3($imgs3)->withImgs4($imgs4)->withImgs5($imgs5)->withAsides($aside)->withTags($tags)->withTitles($titles);
    }

    public function getRwanda(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('location_id', '=', 2)->orderBy('id', 'desc')->paginate(10);
        return view('pages.rwanda')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getAfrica(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('location_id', '=', 3)->orderBy('id', 'desc')->paginate(10);
        return view('pages.africa')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getEngland(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('location_id', '=', 4)->orderBy('id', 'desc')->paginate(10);
        return view('pages.england')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getSpain(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('location_id', '=', 6)->orderBy('id', 'desc')->paginate(10);
        return view('pages.spain')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getFrance(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('location_id', '=', 5)->orderBy('id', 'desc')->paginate(10);
        return view('pages.france')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getItaly(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('location_id', '=', 7)->orderBy('id', 'desc')->paginate(10);
        return view('pages.italy')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getGermany(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('location_id', '=', 8)->orderBy('id', 'desc')->paginate(10);
        return view('pages.germany')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getAmerica(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('location_id', '=', 9)->orderBy('id', 'desc')->paginate(10);
        return view('pages.america')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getAsia(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('location_id', '=', 10)->orderBy('id', 'desc')->paginate(10);
        return view('pages.asia')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getOther(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('location_id', '=', 11)->orderBy('id', 'desc')->paginate(10);
        return view('pages.other')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getBasketball(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('sport_id', '=', 3)->orderBy('id', 'desc')->paginate(10);
        return view('pages.basketball')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getFootball(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('sport_id', '=', 1)->orderBy('id', 'desc')->paginate(10);
        return view('pages.football')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getVolleyball(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('sport_id', '=', 2)->orderBy('id', 'desc')->paginate(10);
        return view('pages.volleyball')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getRugby(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('sport_id', '=', 4)->orderBy('id', 'desc')->paginate(10);
        return view('pages.rugby')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getHandball(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('sport_id', '=', 5)->orderBy('id', 'desc')->paginate(10);
        return view('pages.handball')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getSwimming(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('sport_id', '=', 6)->orderBy('id', 'desc')->paginate(10);
        return view('pages.swimming')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getCricket(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('sport_id', '=', 7)->orderBy('id', 'desc')->paginate(10);
        return view('pages.cricket')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getCycling(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('sport_id', '=', 8)->orderBy('id', 'desc')->paginate(10);
        return view('pages.cycling')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getAthletic(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('sport_id', '=', 9)->orderBy('id', 'desc')->paginate(10);
        return view('pages.athletic')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getVideos(){
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::where('sport_id', '=', 8)->orderBy('id', 'desc')->paginate(10);
        return view('pages.videos')->withPosts($posts)->withAsides($aside)->withNewones($newone)->withTitles($titles);
    }

    public function getContact() {
        $titles= DB::select('select * from posts order by id desc limit 5');
        $aside = Post::where('views', '>=', 1000)->orderBy('views', 'desc')->limit(5)->get();
        $newone = Post::orderBy('created_at', 'desc')->limit(5)->get();
        return view('pages.contact')->withTitles($titles)->withAsides($aside)->withNewones($newone);
    }

    public function postContact(Request $request) {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'phone' => 'required|digits_between:10,20',
            'message' => 'min:10'
        ]);

        $contact = New Contact;
        
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
