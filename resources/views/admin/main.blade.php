@extends('layouts.default')

@if (Auth::check())

@section('content')
<button type="button" class="btn btn-light"><a href=/admin/edit>编辑文章</a></button>

@stop
@endif