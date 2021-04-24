<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

class PostsController extends Controller
{
    public function show($post){
        $way = Route::currentRouteName();
        // $CheckAdmin = Gate::allows('CheckAdmin');
        if ($way == "post_slug") {
            $post = Post::where('slug', $post)->get();
            if (count($post) != 0) {
                $PostMetaData = GetPostMetaData($post[0]);
                if ($PostMetaData != "") {
                    return view('posts.show', ['post' => $PostMetaData]);
                } else {
                    return redirect() -> route('home');
                }
            } else {
                return redirect() -> route('home');
            }
        } elseif ($way == "post_api") {
            $post = Post::where('id', $post)->get();
            $PostMetaData = GetPostMetaData($post[0]);
            if (count($post) != 0) {
                if ($PostMetaData != "") {
                    return view('posts.showapi', ['post' => $PostMetaData]);
                } else {
                    return redirect() -> route('home');
                }
            } else {
                return redirect() -> route('home');
            }
        }
    }
}
