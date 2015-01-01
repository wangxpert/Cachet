<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="env" content="{{ app('env') }}">
    <meta name="token" content="{{ csrf_token() }}">

    <!-- RSS Feed -->
    <link rel="alternate" type="application/rss+xml" href="/rss" title="{{ $pageTitle ?: Setting::get('app_name') }} Status - RSS Feed" />

    <link rel="icon" type="image/png" href="/favicon.ico">
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon" />

    <!-- Mobile friendliness -->
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
    <meta http-equiv="cleartype" content="on">

    <link rel="icon" type="image/png" href="{{ URL::to('img/favicon.ico') }}">
    <link rel="shortcut icon" href="{{ URL::to('img/favicon.png') }}" type="image/x-icon" />

    <link rel="apple-touch-icon" href="{{ URL::to('img/apple-touch-icon.png') }}" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{ URL::to('img/apple-touch-icon-57x57.png') }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::to('img/apple-touch-icon-72x72.png') }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::to('img/apple-touch-icon-114x114.png') }}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::to('img/apple-touch-icon-120x120.png') }}" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::to('img/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::to('img/apple-touch-icon-152x152.png') }}" />

    <title>{{ $pageTitle ?: Setting::get('app_name') }} Status</title>

    <link href='//fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">

    @include('partials.stylesheet')

    @if($stylesheet = Setting::get('stylesheet'))
    <style type='text/css'>
    {{ $stylesheet }}
    </style>
    @endif

    <script src="{{ elixir('js/all.js') }}"></script>
</head>
<body class='status-page'>
    <div class='container'>
    @yield('content')
    </div>

    @include('partials.support-link')
</body>
</html>
