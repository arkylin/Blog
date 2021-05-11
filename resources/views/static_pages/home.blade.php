@extends('layouts.default')

@section('title')
<?php echo config('blog.Name') ?>
@stop

@section('content')
<?php
// echo "<pre>";print_r($posts);echo "</pre>";
?>
<?php
echo GetPostsLists($posts);
?>

@stop

@section('footer')
<!-- Vditor -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vditor/dist/index.css" />
<script src="https://cdn.jsdelivr.net/npm/vditor/dist/index.min.js"></script> -->
@stop