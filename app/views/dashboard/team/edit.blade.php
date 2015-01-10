@extends('layout.dashboard')

@section('content')
    <div class="header">
        <div class="sidebar-toggler visible-xs">
            <i class="icon ion-navicon"></i>
        </div>
        <span class="uppercase">
            <i class="ion ion-person"></i> {{ trans('dashboard.team.member') }}
        </span>
    </div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                @if($updated = Session::get('updated'))
                <div class="alert alert-{{ $updated ? 'success' : 'danger' }}">
                    @if($updated)
                    {{ sprintf("<strong>%s</strong> %s", trans('dashboard.notifications.awesome'), trans('dashboard.team.edit.success')) }}
                    @else
                    {{ sprintf("<strong>%s</strong> %s", trans('dashboard.notifications.whoops'), trans('dashboard.team.edit.failure')) }}
                    @endif
                </div>
                @endif

                <form name="UserForm" class="form-vertical" role="form" action="/dashboard/team/{{ $user->id }}" method="POST">
                    <fieldset>
                        <div class="form-group">
                            <label>{{ trans('forms.user.username') }}</label>
                            <input type="text" class="form-control" name="username" value="{{ $user->username }}" required />
                        </div>
                        <div class="form-group">
                            <label>{{ trans('forms.user.email') }}</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required />
                        </div>
                        <div class="form-group">
                            <label>{{ trans('forms.user.password') }}</label>
                            <input type="password" class="form-control" name="password" value="" {{ !Auth::user()->isAdmin ? "disabled": "" }} />
                        </div>
                    </fieldset>

                    <button type="submit" class="btn btn-success">{{ trans('forms.update') }}</button>
                    @if(Auth::user()->isAdmin)
                    <a class="btn btn-danger" href="/dashboard/user/{{ $user->id }}/api/regen">{{ trans('cachet.api.revoke') }}</a>
                    @endif
                </form>
            </div>
        </div>
    </div>
@stop
