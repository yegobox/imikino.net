<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Post;
use App\Location;
use App\Contact;
use App\Sport;
use App\Tag;
use App\Comment;
use Purifier;
use App\Journalist;
use Session;
use Image;
use Storage;
use Auth;
use DB;

class AjaxUploadController extends Controller
{
    function index()
    {
        return view('adminpages.posts.show');
    }

    public function liveScore(){
        $commentss = Comment::where('approved', '=', 0)->orderBy('id', 'desc')->limit(5)->get();
        $notifications = Contact::where('readed', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('reporterpages.livescore.livescore',[
            'notifications' => $notifications,
        ])->withComs($commentss);
    }

    function action(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image1_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image1');
            $new_name = time() . '.' . $image->getClientOriginalExtension();
            if(isset($request->imikino)){
                Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image1' . $new_name));
            }else{
                Image::make($image)->resize(1366, 768)->save(public_path('images/news/image1' . $new_name));
            }
            DB::table('posts')->where('id', $request->post)->update(['image1' => $new_name, 'image1_txt' => $request->image1_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image' => '<img src="/images/news/image1' . $new_name . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt1' => '<b>' . ucfirst($request->image1_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image' => '',
                'txt1' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action2(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image2');
            $new_name2 = time() . '.' . $image->getClientOriginalExtension();
            if(isset($request->imikino)){
                Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image2' . $new_name2));
            }else{
                Image::make($image)->resize(1366, 768)->save(public_path('images/news/image2' . $new_name2));
            }
            DB::table('posts')->where('id', $request->post)->update(['image2' => $new_name2, 'image2_txt' => $request->image2_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image2' => '<img src="/images/news/image2' . $new_name2 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt1' => '<b>' . ucfirst($request->image2_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image2' => '',
                'txt2' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action3(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image3');
            $new_name3 = time() . '.' . $image->getClientOriginalExtension();

            if(isset($request->imikino)){
                Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image3' . $new_name3));
            }else{
                Image::make($image)->resize(1366, 768)->save(public_path('images/news/image3' . $new_name3));
            }
            DB::table('posts')->where('id', $request->post)->update(['image3' => $new_name3, 'image3_txt' => $request->image3_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image3' => '<img src="/images/news/image3' . $new_name3 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt3' => '<b>' . ucfirst($request->image3_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image3' => '',
                'txt3' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action4(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image4' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image4');
            $new_name4 = time() . '.' . $image->getClientOriginalExtension();
            if(isset($request->imikino)){
                Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image4' . $new_name4));
            }else{
                Image::make($image)->resize(1366, 768)->save(public_path('images/news/image4' . $new_name4));
            }
            DB::table('posts')->where('id', $request->post)->update(['image4' => $new_name4, 'image4_txt' => $request->image4_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image4' => '<img src="/images/news/image4' . $new_name4 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt4' => '<b>' . ucfirst($request->image4_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image4' => '',
                'txt4' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action5(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image5' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image5_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image5');
            $new_name5 = time() . '.' . $image->getClientOriginalExtension();
            if(isset($request->imikino)){
                Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image5' . $new_name5));
            }else{
                Image::make($image)->resize(1366, 768)->save(public_path('images/news/image5' . $new_name5));
            }
            DB::table('posts')->where('id', $request->post)->update(['image5' => $new_name5, 'image5_txt' => $request->image5_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image5' => '<img src="/images/news/image5' . $new_name5 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt5' => '<b>' . ucfirst($request->image5_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image5' => '',
                'txt5' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action6(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image6' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image6_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image6');
            $new_name6 = time() . '.' . $image->getClientOriginalExtension();
            if(isset($request->imikino)){
                Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image6' . $new_name6));
            }else{
                Image::make($image)->resize(1366, 768)->save(public_path('images/news/image6' . $new_name6));
            }
            DB::table('posts')->where('id', $request->post)->update(['image6' => $new_name6, 'image6_txt' => $request->image6_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image6' => '<img src="/images/news/image6' . $new_name6 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt6' => '<b>' . ucfirst($request->image6_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image6' => '',
                'txt6' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }


    function action7(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image7' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image7_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image7');
            $new_name7 = time() . '.' . $image->getClientOriginalExtension();
            if(isset($request->imikino)){
                Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image7' . $new_name7));
            }else{
                Image::make($image)->resize(1366, 768)->save(public_path('images/news/image7' . $new_name7));
            }
            DB::table('posts')->where('id', $request->post)->update(['image7' => $new_name7, 'image7_txt' => $request->image7_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image7' => '<img src="/images/news/image7' . $new_name7 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt7' => '<b>' . ucfirst($request->image7_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image7' => '',
                'txt7' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }


    function action8(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image8' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image8_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image8');
            $new_name8 = time() . '.' . $image->getClientOriginalExtension();
            if(isset($request->imikino)){
                Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image8' . $new_name8));
            }else{
                Image::make($image)->resize(1366, 768)->save(public_path('images/news/image8' . $new_name8));
            }
            DB::table('posts')->where('id', $request->post)->update(['image8' => $new_name8, 'image8_txt' => $request->image8_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image8' => '<img src="/images/news/image8' . $new_name8 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt8' => '<b>' . ucfirst($request->image8_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image8' => '',
                'txt8' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }


    function action9(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image9' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image9_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image9');
            $new_name9 = time() . '.' . $image->getClientOriginalExtension();
            if(isset($request->imikino)){
                Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image9' . $new_name9));
            }else{
                Image::make($image)->resize(1366, 768)->save(public_path('images/news/image9' . $new_name9));
            }
            DB::table('posts')->where('id', $request->post)->update(['image9' => $new_name9, 'image9_txt' => $request->image9_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image9' => '<img src="/images/news/image9' . $new_name9 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt9' => '<b>' . ucfirst($request->image9_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image9' => '',
                'txt9' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action10(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image10' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image10_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image10');
            $new_name10 = time() . '.' . $image->getClientOriginalExtension();
            if(isset($request->imikino)){
                Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image10' . $new_name10));
            }else{
                Image::make($image)->resize(1366, 768)->save(public_path('images/news/image10' . $new_name10));
            }
            DB::table('posts')->where('id', $request->post)->update(['image10' => $new_name10, 'image10_txt' => $request->image10_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image10' => '<img src="/images/news/image10' . $new_name10 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt10' => '<b>' . ucfirst($request->image10_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image10' => '',
                'txt10' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action11(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image11' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image11_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image11');
            $new_name11 = time() . '.' . $image->getClientOriginalExtension();
            if(isset($request->imikino)){
                Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image11' . $new_name11));
            }else{
                Image::make($image)->resize(1366, 768)->save(public_path('images/news/image11' . $new_name11));
            }
            DB::table('posts')->where('id', $request->post)->update(['image11' => $new_name11, 'image11_txt' => $request->image11_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image11' => '<img src="/images/news/image11' . $new_name11 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt11' => '<b>' . ucfirst($request->image11_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image11' => '',
                'txt11' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action12(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image12' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image12_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image12');
            $new_name12 = time() . '.' . $image->getClientOriginalExtension();
            if(isset($request->imikino)){
                Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image12' . $new_name12));
            }else{
                Image::make($image)->resize(1366, 768)->save(public_path('images/news/image12' . $new_name12));
            }
            DB::table('posts')->where('id', $request->post)->update(['image12' => $new_name12, 'image12_txt' => $request->image12_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image12' => '<img src="/images/news/image12' . $new_name12 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt12' => '<b>' . ucfirst($request->image12_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image12' => '',
                'txt12' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }


    function action13(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image13' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image13_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image13');
            $new_name13 = time() . '.' . $image->getClientOriginalExtension();
            if(isset($request->imikino)){
                Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image13' . $new_name13));
            }else{
                Image::make($image)->resize(1366, 768)->save(public_path('images/news/image13' . $new_name13));
            }
            DB::table('posts')->where('id', $request->post)->update(['image13' => $new_name13, 'image13_txt' => $request->image13_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image13' => '<img src="/images/news/image13' . $new_name13 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt13' => '<b>' . ucfirst($request->image13_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image13' => '',
                'txt13' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action14(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image14' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image14_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image14');
            $new_name14 = time() . '.' . $image->getClientOriginalExtension();
            if(isset($request->imikino)){
                Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image14' . $new_name14));
            }else{
                Image::make($image)->resize(1366, 768)->save(public_path('images/news/image14' . $new_name14));
            }
            DB::table('posts')->where('id', $request->post)->update(['image14' => $new_name14, 'image14_txt' => $request->image14_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image14' => '<img src="/images/news/image14' . $new_name14 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt14' => '<b>' . ucfirst($request->image14_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image14' => '',
                'txt14' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action15(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image15' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image15_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image15');
            $new_name15 = time() . '.' . $image->getClientOriginalExtension();
            if(isset($request->imikino)){
                Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image15' . $new_name15));
            }else{
                Image::make($image)->resize(1366, 768)->save(public_path('images/news/image15' . $new_name15));
            }
            DB::table('posts')->where('id', $request->post)->update(['image15' => $new_name15, 'image15_txt' => $request->image15_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image15' => '<img src="/images/news/image15' . $new_name15 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt15' => '<b>' . ucfirst($request->image15_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image15' => '',
                'txt15' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function profile(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validation->passes()) {
            $image = $request->file('image');
            $new_name = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(215, 215)->save(public_path('admin/dist/img/' . $new_name));
            DB::table('journalists')->where('id', $request->user_id)->update(['image' => $new_name]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image5' => '/admin/dist/img/' . $new_name,
                'class_name' => 'alert-success'
            ]);
        } else {
            $sameImage = Journalist::find($request->user_id);
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image5' => '/admin/dist/img/' . $sameImage->image,
                'class_name' => 'alert-danger'
            ]);
        }
    }


    //Live Streaming
    function actionn(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image1_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image1');
            $new_name = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image1' . $new_name));
            DB::table('lives')->where('id', $request->post)->update(['image1' => $new_name, 'image1_txt' => $request->image1_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image' => '<img src="/images/news/image1' . $new_name . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt1' => '<b>' . ucfirst($request->image1_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image' => '',
                'txt1' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action22(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image2');
            $new_name2 = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image2' . $new_name2));
            DB::table('lives')->where('id', $request->post)->update(['image2' => $new_name2, 'image2_txt' => $request->image2_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image2' => '<img src="/images/news/image2' . $new_name2 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt1' => '<b>' . ucfirst($request->image2_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image2' => '',
                'txt2' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action33(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image3');
            $new_name3 = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image3' . $new_name3));
            DB::table('lives')->where('id', $request->post)->update(['image3' => $new_name3, 'image3_txt' => $request->image3_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image3' => '<img src="/images/news/image3' . $new_name3 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt3' => '<b>' . ucfirst($request->image3_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image3' => '',
                'txt3' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action44(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image4' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image4');
            $new_name4 = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image4' . $new_name4));
            DB::table('lives')->where('id', $request->post)->update(['image4' => $new_name4, 'image4_txt' => $request->image4_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image4' => '<img src="/images/news/image4' . $new_name4 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt4' => '<b>' . ucfirst($request->image4_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image4' => '',
                'txt4' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action55(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image5' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image5_txt' => 'sometimes|max:255',
            'post' => 'required'
        ]);

        if ($validation->passes()) {
            $image = $request->file('image5');
            $new_name5 = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1366, 768)->insert('images/watermark.png', 'bottom-right')->save(public_path('images/news/image5' . $new_name5));
            DB::table('lives')->where('id', $request->post)->update(['image5' => $new_name5, 'image5_txt' => $request->image5_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image5' => '<img src="/images/news/image5' . $new_name5 . '" class="img-responsive pad" alt="No Picture Available" />',
                'txt5' => '<b>' . ucfirst($request->image5_txt) . '</b>',
                'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image5' => '',
                'txt5' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }
}
