@extends('layouts.default')

@if (Auth::check())

@section('title')
<?php
    echo '新建文章' . " | " . config('blog.Name');
?>
@stop

@section('content')
@include('layouts.edit_posts', ['ifnew' => 'y'])
@stop
@endif