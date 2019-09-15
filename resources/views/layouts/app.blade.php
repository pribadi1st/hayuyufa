<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Chinese Teak - @yield('title')</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <!-- Styles -->
    </head>
    <body>
        <div class="header">
            <img 
                src="https://static.wixstatic.com/media/a4e3ba_8e347b7e91e944549b7225e10bf40247~mv2.png/v1/fill/w_191,h_206,al_c,q_80,usm_0.66_1.00_0.01/logo_hanyuyufa_color.webp" alt="logo"
                width="96"
                height="103"
            />
            <a href="{{ url('/') }}" class="title">Chinese Teak</a>
            <span class="sub-title">
                Chinese Grammar Checker
            </span>
            <div class="divider"></div>
        </div>
        @yield('content')
        <!-- @isset($flags)
            <div class="result">
                <span>结果 : </span>
                <br>
                @foreach($flags as $key => $value)
                    @if($value == 1)
                        <span class="green">{{$values[$key]}}</span>
                    @else
                        <span class="red">{{$values[$key]}}</span>
                    @endif
                @endforeach
                <br><br>
                @foreach($tag as $key => $value)
                    {{$values[$key]}} : {{$value}} {{$flags[$key]}} <br> 
                @endforeach
            </div>
        @endif -->
        <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>
