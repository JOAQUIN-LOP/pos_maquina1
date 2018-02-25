@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('adminlte::adminlte.login_message') }}</p>
            <form action="{{ url('do_login') }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('user') ? 'has-error' : '' }}">
                    <input type="user" name="user" class="form-control" value="{{ old('user') }}"
                           placeholder="{{ trans('adminlte::adminlte.user') }}">
                    
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('user'))
                        <span class="help-block">
                            <strong>{{ $errors->first('user') }}</strong>
                        </span>
                    @endif
                    
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row text-center">
                    
                    <!-- /.col -->
                    <div class="form-group">
                        <button type="submit"
                                class="btn btn-primary btn-flat">{{ trans('adminlte::adminlte.log_in') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop

@section('adminlte_js')
    
    @yield('js')
@stop
