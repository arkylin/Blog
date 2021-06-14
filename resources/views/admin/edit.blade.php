@extends('layouts.default')

@if (Auth::check())

@section('title')
<?php
    $MD_title = $post['title'];
    if ( $MD_title !="" ) {
        echo $MD_title . " | " . config('blog.Name');
    } else {
        echo config('blog.Name');
    }
?>
@stop

@section('content')
@include('layouts.edit_posts', [
    'ifnew' => 'n',
    'post' => $post])
@stop
@endif