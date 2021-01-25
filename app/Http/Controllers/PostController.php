<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index(){
//        abed_348@hotmail.com
        $posts = Post::all();
//        $search = Post::where('title', 'LIKE', '%' . $category . '%');
        return view('posts.index',compact('posts'));
    }

    public function search()
    {
        $title = \request('title');
        $posts = Post::where('title','like', '%' . $title . '%')->get();
//        $posts = Post::all();
//        dd($searchResult);
        return view('posts.search',compact('title','posts','posts'));
    }

    public function show($slug){
        $post = Post::where('slug',$slug)->first();
        dd($post);
        return view('posts.show',['post'=>$post]);
    }

    public function create(){
        $countries = Country::get(['name','id']);
//        dd($countries);
        return view('posts.create',['countries'=>$countries]);
    }

    public function store(Request $request){
//        dd('store');
        $inputs = $request->all();
        $inputs['slug'] = Str::slug($request->title);
//        dd($inputs);
        Post::create($inputs);

        return redirect('posts');

    }

    public function edit($id){
        $post = Post::findOrFail($id);
//        dd($post->country->citizen);
        $countries = Country::get(['name','id']);
        return view('posts.edit',compact('post','countries'));
    }

    public function GetCity($country_id){
        $city = City::where('country_id',$country_id)->get();
        return json_encode($city);
    }

    public function update(Request $request,$id){

        $inputs = $request->all();
        $post = Post::findOrFail($id);
        $inputs['slug'] = Str::slug($request->title);
        $post->update($inputs);

        return redirect('posts');
    }

    public function delete($id){
        $post = Post::find($id)->delete();
        return redirect('posts');
    }
    //
}
