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

class PagesController extends Controller
{
    public function getTags($id)
    {
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $tag = Tag::find($id);
        //$tags = $tag->posts()->paginate(5);
        return view('pages.tag')->withTag($tag)->withAsides($aside)->withNewones($newone);
    }

    public function getIndex(){
        $tags = DB::select('select * from tags order by id desc');
        $first = DB::select('select * from posts order by id desc limit 0,1');
        $other = DB::select('select * from posts order by id desc limit 1,4');
        $list = DB::select('select * from posts order by id desc limit 5,14');
        $imgs1 = DB::select('select image,slug from posts order by id desc limit 0,2');
        $imgs2 = DB::select('select image,slug from posts order by id desc limit 2,2');
        $imgs3 = DB::select('select image,slug from posts order by id desc limit 4,2');
        $imgs4 = DB::select('select image,slug from posts order by id desc limit 6,2');
        $imgs5 = DB::select('select image,slug from posts order by id desc limit 8,2');
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        //$posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        return view('pages.home')->withOthers($other)->withFirsts($first)->withLists($list)->withImgs1($imgs1)->withImgs2($imgs2)->withImgs3($imgs3)->withImgs4($imgs4)->withImgs5($imgs5)->withAsides($aside)->withTags($tags);
    }

    public function getRwanda(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('location_id', '=', 2)->paginate(5);
        return view('pages.rwanda')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getAfrica(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('location_id', '=', 3)->paginate(5);
        return view('pages.africa')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getEngland(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('location_id', '=', 4)->paginate(5);
        return view('pages.england')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getSpain(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('location_id', '=', 6)->paginate(5);
        return view('pages.spain')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getFrance(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('location_id', '=', 5)->paginate(5);
        return view('pages.france')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getItaly(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('location_id', '=', 7)->paginate(5);
        return view('pages.italy')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getGermany(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('location_id', '=', 8)->paginate(5);
        return view('pages.germany')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getAmerica(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('location_id', '=', 9)->paginate(5);
        return view('pages.america')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getAsia(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('location_id', '=', 10)->paginate(5);
        return view('pages.asia')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getOther(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('location_id', '=', 11)->paginate(5);
        return view('pages.other')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getBasketball(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('sport_id', '=', 3)->paginate(5);
        return view('pages.basketball')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getFootball(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('sport_id', '=', 1)->paginate(5);
        return view('pages.football')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getVolleyball(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('sport_id', '=', 2)->paginate(5);
        return view('pages.volleyball')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getRugby(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('sport_id', '=', 4)->paginate(5);
        return view('pages.rugby')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getHandball(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('sport_id', '=', 5)->paginate(5);
        return view('pages.handball')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getSwimming(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('sport_id', '=', 6)->paginate(5);
        return view('pages.swimming')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getCricket(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('sport_id', '=', 7)->paginate(5);
        return view('pages.cricket')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getCycling(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('sport_id', '=', 8)->paginate(5);
        return view('pages.cycling')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getAthletic(){
        $aside = DB::table('posts')->where('views', '>=', 20)->orderBy('views', 'desc')->limit(3)->get();
        $newone = DB::table('posts')->orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('sport_id', '=', 9)->paginate(5);
        return view('pages.athletic')->withPosts($posts)->withAsides($aside)->withNewones($newone);
    }

    public function getContact() {
        return view('pages.contact');
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
        $contact->counter = '1';
        $contact->readed = '1';
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
