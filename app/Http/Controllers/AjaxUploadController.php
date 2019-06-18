<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Post;
use App\Location;
use App\Sport;
use App\Tag;
use App\Comment;
use Purifier;
use App\Journalist;
use Session;
use Image;
use Storage;
use DB;

class AjaxUploadController extends Controller
{
    function index(){
        return view('adminpages.posts.show');
    }

    function action(Request $request){
        $validation = Validator::make($request->all(), [
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image1_txt' => 'required|max:255',
            'post' => 'required'
        ]);

        if($validation->passes()){
            $image = $request->file('image1');
            $new_name = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1366, 768)->save(public_path('images/news/image1' . $new_name));
            DB::table('posts')->where('id', $request->post)->update(['image1' => $new_name, 'image1_txt' => $request->image1_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image' => '<img src="/images/news/image1'.$new_name.'" class="img-responsive pad" alt="No Picture Available" />',
                'txt1' => '<b>'.ucfirst($request->image1_txt).'</b>',
                'class_name' => 'alert-success'
            ]);
        }else{
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image' => '',
                'txt1' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action2(Request $request){
        $validation = Validator::make($request->all(), [
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2_txt' => 'required|max:255',
            'post' => 'required'
        ]);

        if($validation->passes()){
            $image = $request->file('image2');
            $new_name2 = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1366, 768)->save(public_path('images/news/image2' . $new_name2));
            DB::table('posts')->where('id', $request->post)->update(['image2' => $new_name2, 'image2_txt' => $request->image2_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image2' => '<img src="/images/news/image2'.$new_name2.'" class="img-responsive pad" alt="No Picture Available" />',
                'txt1' => '<b>'.ucfirst($request->image2_txt).'</b>',
                'class_name' => 'alert-success'
            ]);
        }else{
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image2' => '',
                'txt2' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action3(Request $request){
        $validation = Validator::make($request->all(), [
            'image3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3_txt' => 'required|max:255',
            'post' => 'required'
        ]);

        if($validation->passes()){
            $image = $request->file('image3');
            $new_name3 = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1366, 768)->save(public_path('images/news/image3' . $new_name3));
            DB::table('posts')->where('id', $request->post)->update(['image3' => $new_name3, 'image3_txt' => $request->image3_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image3' => '<img src="/images/news/image3'.$new_name3.'" class="img-responsive pad" alt="No Picture Available" />',
                'txt3' => '<b>'.ucfirst($request->image3_txt).'</b>',
                'class_name' => 'alert-success'
            ]);
        }else{
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image3' => '',
                'txt3' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action4(Request $request){
        $validation = Validator::make($request->all(), [
            'image4' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4_txt' => 'required|max:255',
            'post' => 'required'
        ]);

        if($validation->passes()){
            $image = $request->file('image4');
            $new_name4 = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1366, 768)->save(public_path('images/news/image4' . $new_name4));
            DB::table('posts')->where('id', $request->post)->update(['image4' => $new_name4, 'image4_txt' => $request->image4_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image4' => '<img src="/images/news/image4'.$new_name4.'" class="img-responsive pad" alt="No Picture Available" />',
                'txt4' => '<b>'.ucfirst($request->image4_txt).'</b>',
                'class_name' => 'alert-success'
            ]);
        }else{
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image4' => '',
                'txt4' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action5(Request $request){
        $validation = Validator::make($request->all(), [
            'image5' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image5_txt' => 'required|max:255',
            'post' => 'required'
        ]);

        if($validation->passes()){
            $image = $request->file('image5');
            $new_name5 = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1366, 768)->save(public_path('images/news/image5' . $new_name5));
            DB::table('posts')->where('id', $request->post)->update(['image5' => $new_name5, 'image5_txt' => $request->image5_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image5' => '<img src="/images/news/image5'.$new_name5.'" class="img-responsive pad" alt="No Picture Available" />',
                'txt5' => '<b>'.ucfirst($request->image5_txt).'</b>',
                'class_name' => 'alert-success'
            ]);
        }else{
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image5' => '',
                'txt5' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function profile(Request $request){
        $validation = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($validation->passes()){
            $image = $request->file('image');
            $new_name = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(215, 215)->save(public_path('admin/dist/img/' . $new_name));
            DB::table('journalists')->where('id', $request->user_id)->update(['image' => $new_name]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image5' => '/admin/dist/img/'.$new_name,
                'class_name' => 'alert-success'
            ]);
        }else{
            $sameImage = Journalist::find($request->user_id);
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image5' => '/admin/dist/img/'.$sameImage->image,
                'class_name' => 'alert-danger'
            ]);
        }
    }


    //Live Streaming
    function actionn(Request $request){
        $validation = Validator::make($request->all(), [
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image1_txt' => 'required|max:255',
            'post' => 'required'
        ]);

        if($validation->passes()){
            $image = $request->file('image1');
            $new_name = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1366, 768)->save(public_path('images/news/image1' . $new_name));
            DB::table('lives')->where('id', $request->post)->update(['image1' => $new_name, 'image1_txt' => $request->image1_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image' => '<img src="/images/news/image1'.$new_name.'" class="img-responsive pad" alt="No Picture Available" />',
                'txt1' => '<b>'.ucfirst($request->image1_txt).'</b>',
                'class_name' => 'alert-success'
            ]);
        }else{
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image' => '',
                'txt1' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action22(Request $request){
        $validation = Validator::make($request->all(), [
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2_txt' => 'required|max:255',
            'post' => 'required'
        ]);

        if($validation->passes()){
            $image = $request->file('image2');
            $new_name2 = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1366, 768)->save(public_path('images/news/image2' . $new_name2));
            DB::table('lives')->where('id', $request->post)->update(['image2' => $new_name2, 'image2_txt' => $request->image2_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image2' => '<img src="/images/news/image2'.$new_name2.'" class="img-responsive pad" alt="No Picture Available" />',
                'txt1' => '<b>'.ucfirst($request->image2_txt).'</b>',
                'class_name' => 'alert-success'
            ]);
        }else{
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image2' => '',
                'txt2' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action33(Request $request){
        $validation = Validator::make($request->all(), [
            'image3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3_txt' => 'required|max:255',
            'post' => 'required'
        ]);

        if($validation->passes()){
            $image = $request->file('image3');
            $new_name3 = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1366, 768)->save(public_path('images/news/image3' . $new_name3));
            DB::table('lives')->where('id', $request->post)->update(['image3' => $new_name3, 'image3_txt' => $request->image3_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image3' => '<img src="/images/news/image3'.$new_name3.'" class="img-responsive pad" alt="No Picture Available" />',
                'txt3' => '<b>'.ucfirst($request->image3_txt).'</b>',
                'class_name' => 'alert-success'
            ]);
        }else{
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image3' => '',
                'txt3' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action44(Request $request){
        $validation = Validator::make($request->all(), [
            'image4' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4_txt' => 'required|max:255',
            'post' => 'required'
        ]);

        if($validation->passes()){
            $image = $request->file('image4');
            $new_name4 = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1366, 768)->save(public_path('images/news/image4' . $new_name4));
            DB::table('lives')->where('id', $request->post)->update(['image4' => $new_name4, 'image4_txt' => $request->image4_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image4' => '<img src="/images/news/image4'.$new_name4.'" class="img-responsive pad" alt="No Picture Available" />',
                'txt4' => '<b>'.ucfirst($request->image4_txt).'</b>',
                'class_name' => 'alert-success'
            ]);
        }else{
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image4' => '',
                'txt4' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    function action55(Request $request){
        $validation = Validator::make($request->all(), [
            'image5' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image5_txt' => 'required|max:255',
            'post' => 'required'
        ]);

        if($validation->passes()){
            $image = $request->file('image5');
            $new_name5 = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1366, 768)->save(public_path('images/news/image5' . $new_name5));
            DB::table('lives')->where('id', $request->post)->update(['image5' => $new_name5, 'image5_txt' => $request->image5_txt]);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'uploaded_image5' => '<img src="/images/news/image5'.$new_name5.'" class="img-responsive pad" alt="No Picture Available" />',
                'txt5' => '<b>'.ucfirst($request->image5_txt).'</b>',
                'class_name' => 'alert-success'
            ]);
        }else{
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image5' => '',
                'txt5' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }
}
