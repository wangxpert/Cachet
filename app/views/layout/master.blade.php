<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="env" content="{{ app('env') }}">
    <meta name="token" content="{{ csrf_token() }}">

    <link rel="alternate" type="application/atom+xml" href="/atom" title="{{ $pageTitle ?: Setting::get('app_name') }} Status - Atom Feed">
    <link rel="alternate" type="application/rss+xml" href="/rss" title="{{ $pageTitle ?: Setting::get('app_name') }} Status - RSS Feed">

    <!-- Mobile friendliness -->
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
    <meta http-equiv="cleartype" content="on">

    <link rel="icon" type="image/png" href="{{ url('img/favicon.ico') }}">
    <link rel="shortcut icon" href="{{ url('img/favicon.png') }}" type="image/x-icon">

    <link rel="apple-touch-icon" href="{{ url('img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ url('img/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('img/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('img/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ url('img/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('img/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ url('img/apple-touch-icon-152x152.png') }}">

    <title>{{ $pageTitle ?: Setting::get('app_name') }} Status</title>

    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ elixir('dist/css/all.css') }}">

    @include('partials.stylesheet')

    @include('partials.crowdin')

    @if($stylesheet = Setting::get('stylesheet'))
    <style type="text/css">
    {{ $stylesheet }}
    </style>
    @endif

    <script type="text/javascript">
        var Global = {};
        Global.locale = '{{ Setting::get('app_locale') }}';
    </script>
    <script src="{{ elixir('dist/js/all.js') }}"></script>
</head>
<body class="status-page">
    <div class="container">
    @yield('content')
    </div>

    @include('partials.footer')
</body>
</html>
