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
        if (array_key_exists('id', $action->all()) && !array_key_exists('content', $action->all())) {
            $post_get = Post::find($action->all()['id']);
            return view('admin/edit', ['post' => $post_get]);
        } elseif ( array_key_exists('id', $action->all()) && array_key_exists('content', $action->all()) ) {
            Post::where('id', $action->all()['id'])->update($action->all());
            return '提交成功！';
        } elseif ( !array_key_exists('id', $action->all()) && array_key_exists('new', $action->all()) ) {
            return view('admin/new');;
        } elseif ( !array_key_exists('id', $action->all()) && array_key_exists('content', $action->all()) ) {
            Post::insert($action->all());
            return '提交成功！';
        } else {
            $posts = Post::orderBy('created','desc')->paginate(20)->toArray();
            return view('admin/lists', ['posts' => $posts]);
        }
    }

    public function new(User $user) {
        $this->authorize('CheckAdmin', $user);
        return view('admin/new');
    }
}
