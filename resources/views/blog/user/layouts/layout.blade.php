<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page.title')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    
    <div class="site">

        @include('blog.user.includes.header')

        @if(Session::has('success'))
            @include('blog.success.success')
        @else
            @yield('content')
        @endif
            
    </div>

    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>