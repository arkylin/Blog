<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title', "Arkylin's Blog")</title>
        <!-- 引入混合 -->
        <script src="<?php echo env('APP_URL') ?>/assets/bundle.js"></script>
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