@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'register-page')

@section('body')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{ trans('adminlte::adminlte.register_message') }}</p>
            <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('nom_usuario') ? 'has-error' : '' }}">
                    <input type="text" name="nom_usuario" class="form-control" value="{{ old('nom_usuario') }}"
                           placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('nom_usuario'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nom_usuario') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('apellidos') ? 'has-error' : '' }}">
                    <input type="email" name="apellidos" class="form-control" value="{{ old('apellidos') }}"
                           placeholder="{{ trans('adminlte::adminlte.last_name') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('apellidos'))
                        <span class="help-block">
                            <strong>{{ $errors->first('apellidos') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('user') ? 'has-error' : '' }}">
                    <input type="text" name="user" class="form-control" value="{{ old('user') }}"
                           placeholder="{{ trans('adminlte::adminlte.user') }}">
                    <span class="fa fa-user form-control-feedback"></span>
                    @if ($errors->has('user'))
                        <span class="help-block">
                            <strong>{{ $errors->first('user') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('empresa') ? 'has-error' : '' }}">

                    <select class="form-control" id="empresa" name="empresa">
                        
                        <option value>Selección Empresa</option>
                        <option value="1">Emp_1</option>                   
                        <option value="2">Emp_2</option>
                        <option value="1">Emp_1</option>                   
                        <option value="2">Emp_2</option>
                        <option value="1">Emp_1</option>                   
                        <option value="2">Emp_2</option>
                        <option value="1">Emp_1</option>                   
                        <option value="2">Emp_2</option>
                        <option value="1">Emp_1</option>                   
                        <option value="2">Emp_2</option>
                        <option value="1">Emp_1</option>                   
                        <option value="2">Emp_2</option>
                        <option value="2">Emp_2</option>
                        <option value="1">Emp_1</option>                   
                        <option value="2">Emp_2</option>
                        <option value="2">Emp_2</option>
                        <option value="1">Emp_1</option>                   
                        <option value="2">Emp_2</option>

                    </select>                    
                    @if ($errors->has('empresa'))
                        <span class="help-block">
                            <strong>{{ $errors->first('empresa') }}</strong>
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
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit"
                        class="btn btn-primary btn-block btn-flat"
                >{{ trans('adminlte::adminlte.register') }}</button>
            </form>
            <div class="auth-links">
                <a href="{{ url(config('adminlte.login_url', 'login')) }}"
                   class="text-center">{{ trans('adminlte::adminlte.i_already_have_a_membership') }}</a>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

@section('adminlte_js')
    @yield('js')
@stop
