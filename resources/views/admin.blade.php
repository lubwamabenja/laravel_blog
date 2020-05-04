<!doctype html>
<html>
<head>


    @include('adminPartials._adminhead')
    @yield('stylesheets')

    <title></title>
</head>
<body class="materialdesign">
    <div class="wrapper-pro">
        @include('adminPartials._adminSideBar')
        <div class="content-inner-all">
            @include('adminPartials._adminHeader')
            @include('adminPartials._adminBreadcome')
            @include('adminPartials._adminMobile')
            @include('adminPartials._adminBreadcome2')
            @include('adminPartials._messages')


            @yield('content')
        </div>

    </div>
    @include('adminPartials._adminChat')
    @include('adminPartials._adminScripts')
    @yield('scripts')

</body>
</html>
