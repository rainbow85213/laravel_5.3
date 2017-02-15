<html>

    <head>
        @include('admin.layout.meta')
        <title>Spoview</title>

        @section('css')
            @include('admin.layout.css')
        @show
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include('admin.layout.header')
            @include('admin.layout.sidebar')

            @yield('content')

            @include('admin.layout.footer')

        </div>

        @section('javascript')
            @include('admin.layout.script')
        @show
    </body>

</html>