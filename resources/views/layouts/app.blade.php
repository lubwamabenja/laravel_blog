<!DOCTYPE html>
<html lang="en">
<head>
    @include('mainPartials._head')
</head>
<body>
    @include('mainPartials._header')
    <div class="site-main-container">
        @yield('content')
    </div>


    @include('mainPartials._scripts')
</body>
</html>
