@extends('layout.master')

@section('content')
    @if($bannerImage = Setting::get('app_banner'))
    <div class="row app-banner">
        <div class="col-md-12 text-center">
            <?php $bannerType = Setting::get('app_banner_type') ?>
            @if($appUrl = Setting::get('app_domain'))
            <a href="{{ $appUrl }}"><img src="data:{{ $bannerType }};base64, {{ $bannerImage}}" class="banner-image img-responsive"></a>
            @else
            <img src="data:{{ $bannerType }};base64, {{ $bannerImage}}" class="banner-image img-responsive">
            @endif
        </div>
    </div>
    @endif

    @if($aboutApp)
    <div class="about-app">
        <h1>{{ trans('cachet.about_this_site') }}</h1>
        <p>{!! $aboutApp !!}</p>
    </div>
    @endif

    @include('partials.dashboard.errors')

    <h1>{{ trans('cachet.subscriber.subscribe') }}</h1>
    <form action="{{ route('subscribe') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="email">{{ trans('cachet.subscriber.email.subscribe') }}</label>
            <input class="form-control" type="text" name="email">
        </div>
        <div class="form-group">
            <input class="btn btn-success btn-outline" type="submit" value="{{ trans('cachet.subscriber.button') }}">
        </div>
    </form>
@stop
