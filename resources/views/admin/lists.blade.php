@extends('layouts.default')

@if (Auth::check())

@section('content')

<?php
// echo "<pre>";print_r($posts);echo "</pre>";
?>
<button class="btn btn-primary" onclick="window.location.href = 'https:\/\/blog.xyz.blue/admin/edit?new'">新建文章</button>
<hr class="dropdown-divider">

<?php
echo GetPostsLists($posts);
?>

@stop

@endif