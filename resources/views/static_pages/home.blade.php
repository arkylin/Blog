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
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="..." alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>
@section('footer')
<!-- Vditor -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vditor/dist/index.css" />
<script src="https://cdn.jsdelivr.net/npm/vditor/dist/index.min.js"></script> -->
@stop