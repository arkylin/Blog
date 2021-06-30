<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
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
        $GetRequest = $action->all();
        if (array_key_exists('id', $GetRequest) && !array_key_exists('content', $GetRequest)) {
            $post_get = Post::find($GetRequest['id']);
            return view('admin/edit', ['post' => $post_get]);
        } elseif ( array_key_exists('id', $GetRequest) && array_key_exists('content', $GetRequest) ) {
            Post::where('id', $GetRequest['id'])->update($GetRequest);
            return '提交成功！';
        } elseif ( !array_key_exists('id', $GetRequest) && array_key_exists('new', $GetRequest) && !array_key_exists('content', $GetRequest) ) {
            return view('admin/new');
        } elseif ( array_key_exists('new', $GetRequest) && array_key_exists('content', $GetRequest) ) {
            unset($GetRequest['new']);
            Post::insert($GetRequest);
            return '提交成功！';
        } else {
            $posts = Post::orderBy('created','desc')->paginate(20)->toArray();
            return view('admin/lists', ['posts' => $posts]);
        }
    }
    
    public function upload(User $user, Request $request){
        $this->authorize('CheckAdmin', $user);
    	if ($request->isMethod('POST')) { //判断是否是POST上传，应该不会有人用get吧，恩，不会的
    		//在源生的php代码中是使用$_FILE来查看上传文件的属性
    		//但是在laravel里面有更好的封装好的方法，就是下面这个
    		//显示的属性更多
    		$fileCharater = $request->file('photo');
            $FileUploadTime = time();
 
    		if ($fileCharater->isValid()) { //括号里面的是必须加的哦
    			//如果括号里面的不加上的话，下面的方法也无法调用的
 
                // 原文件名
                $originalName = $fileCharater->getClientOriginalName();
    			//获取文件的扩展名 
    			$ext = $fileCharater->getClientOriginalExtension();
                // $ext = 'png';
 
    			//获取文件的绝对路径
    			$path = $fileCharater->getRealPath();
 
    			//定义文件名 uniqid()
    			$filename = $FileUploadTime.'.'.$ext;
                $filepath = date("Y",$FileUploadTime) . '/' . date("m",$FileUploadTime) . '/' . $filename;
 
    			//存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
    			Storage::disk('public')->put($filepath, file_get_contents($path));

                return env('APP_URL') . '/storage/' . $filepath;
    		}
    	}
    	// return view('upload');
    }
}
