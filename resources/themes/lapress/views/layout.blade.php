<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('lapress::meta._dns')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="alternate" type="application/rss+xml" title="" href="{{ url('/feed') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,800|Roboto&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('/lapress/dist/css/style.css') }}">
    <meta property="fb:app_id" content="{{ config('seotools.facebook.app_id') }}" />
    {!! SEO::generate(true) !!}
    @include('lapress::meta._favicon')
    @include('lapress::meta._google-analytics')
</head>
<body>
<div id="app">
    @include('lapress::partials._header')

    @yield('content:before')
    <section>
        <div class="container flex flex-wrap base:flex-no-wrap">
            <div class="content w-full base:w-3/4">
                @yield('content')
            </div>
            <div class="w-full base:w-1/4 base:pl-8 pb-20 xs:hidden">
                @include('lapress::partials._sidebar')
            </div>

        </div>
    </section>

    @yield('content:after')
    @include('lapress::partials._footer')

    <portal-target name="modal"></portal-target>
    <privacy-popup></privacy-popup>
</div>
@yield('footer:scripts:before')
    <script src="{{ mix('/theme/dist/js/app.js') }}"></script>
@yield('footer:scripts:after')
</body>
</html>
