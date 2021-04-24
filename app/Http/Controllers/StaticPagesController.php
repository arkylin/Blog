<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\Post;

class StaticPagesController extends Controller
{
    //
    public function home()
    {
        // $posts = Post::orderBy('created','desc')->limit(20)->get();
        $posts = Post::orderBy('created','desc')->paginate(20)->toArray();
        // $posts = Post::orderBy('created','desc')->get('id');
        // return $posts;
        return view('static_pages/home', ['posts' => $posts]);
    }
}
