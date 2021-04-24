<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin/main');
    }

    public function edit(Request $action, User $user)
    {
        $this->authorize('CheckAdmin', $user);
        if ( array_key_exists('id', $action->all()) && !array_key_exists('post', $action->all()) ) {
            $post_get = Post::find($action->all()['id']);
            return view('admin/edit', ['post' => $post_get]);
        } elseif ( array_key_exists('post', $action->all()) && array_key_exists('id', $action->all()) ) {
            Post::where('id', $action->all()['id'])->update(['content' => $action->all()['post']]);
            $post_get = Post::find($action->all()['id']);
            // session()->flash('success', '文章更新成功！');
            // return view('admin/edit', ['post' => $post_get]);
            return 'success';
        } else {
            $posts = Post::orderBy('created','desc')->paginate(20)->toArray();
            return view('admin/lists', ['posts' => $posts]);
        }
    }
}
