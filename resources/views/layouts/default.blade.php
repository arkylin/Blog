<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title', "Arkylin's Blog")</title>
        <!-- 引入js、css -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}"></script>
        <!-- Jquery -->
        <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
        <!-- Font-Awesome -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/FortAwesome/Font-Awesome/css/all.min.css">
        <!-- Bootstrap -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/twbs/bootstrap@main/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/gh/twbs/bootstrap@main/dist/js/bootstrap.min.js"></script>
        <!-- CSRF -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- @yield('vditor', "") -->
        @yield('header', "")
    </head>
    <body>
    <div class="container" id="main">
        @include('layouts._header')
            <div class="offset-md-1 col-md-10">
            @include('shared._messages')
            </div>
        @yield('content')
        </div>
        <!-- @yield('post_vditor', "") -->
        @yield('footer', "")
        <!-- 页脚扩展 -->
        @includeIf('layouts._footer')
        </br>
    </body>
</html>