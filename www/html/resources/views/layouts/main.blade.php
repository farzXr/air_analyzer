<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/sass/app.scss')
    @vite('resources/css/main.css')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('css/air_blocks/nicepage.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('css/air_blocks/index.css')}}" media="screen">
    <script class="u-script" type="text/javascript" src="{{asset('js/air_blocks/jquery.js')}}" defer=""></script>
    <script class="u-script" type="text/javascript" src="{{asset('js/air_blocks/nicepage.js')}}" defer=""></script>
    <title>Document</title>
</head>
<body>
    @include('include.nav')
    <div class="air-blocks">
        @yield('air-blocks')
    </div>
    <div class="container">

    </div>

</body>
</html>
