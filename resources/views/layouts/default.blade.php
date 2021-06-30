<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title', "Arkylin's Blog")</title>
        <!-- 引入js、css -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}"></script>
        <!-- CSRF -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
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