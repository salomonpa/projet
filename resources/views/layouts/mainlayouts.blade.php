<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    @include('layouts.style')
</head>

<body>

    <div id="mytask-layout" class="theme-indigo">

        <!-- sidebar -->
        @include('require.sidebar')

        <!-- sidebar -->

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            <!-- Body: Header -->
            @include('require.header')
            <!-- Body: Header -->


            <!-- Body: Body -->
            @yield('contenu')
            <!-- Body: Body -->

            <!-- Modal Members-->
            @include('require.detail')
            <!-- Modal Members-->

    <!-- Jquery Core Js -->
    @include('layouts.script')
    <!-- Jquery Core Js -->
</body>

</html>
