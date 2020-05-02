<!doctype html>
<html lang="en">

  <head>

    @include('pagePartials._head')

  </head>

  <body>
    <div class="wrap">
        <div class="super_container">


            @include('pagePartials._nav')
            @include('pagePartials._messages')


            @yield('content')


            @include('pagePartials._foot')
            @include('pagePartials._scripts')
        </div>
    </div>
  </body>
</html>


