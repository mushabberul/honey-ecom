<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Tohoney - @yield('frontend_title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('frondend.layouts.inc.style')
    </head>

    <body>
        <!--Start Preloader-->
        <div class="preloader-wrap">
            <div class="spinner"></div>
        </div>

        @include('frondend.layouts.inc.search')
        @include('frondend.layouts.inc.header')

        @yield('frontend_content')

        @include('frondend.layouts.inc.newsletter')
        @include('frondend.layouts.inc.footer')
        {{--@include('frondend.layouts.inc.modal')--}}
        @include('frondend.layouts.inc.script')
    </body>
</html>
