@extends('layouts.default')

@if (Auth::check())

@section('content')

<?php
// echo "<pre>";print_r($posts);echo "</pre>";
?>

<hr class="dropdown-divider">

<?php
echo GetPostsLists($posts);
?>

@stop

@endif