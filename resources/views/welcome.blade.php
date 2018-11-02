<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Hayuyufa</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
        <!-- Styles -->
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h3>Chinese Grammar Checker</h3>
            </div>
            <div class="flex-center">
                <form method="post" action="predict">
                    {{csrf_field()}}
                    <div>
                        <input type="text" name="grammar" class="input">
                        <input type="submit" value="校验" class="input">
                    </div>
                    <select name="bab">
                        @for ($i = 9; $i < 33; $i++)
                            <option value={{$i}}>第 {{ $i }} 章</option>
                        @endfor
                    </select>
                </form>
            </div>
            @isset($flags)
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
            @endif
        </div>
    </body>
</html>
