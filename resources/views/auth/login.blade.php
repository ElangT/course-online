@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('ak_user_email') ? ' has-error' : '' }}">
                            <label for="ak_user_email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="ak_user_email" type="email" class="form-control" name="ak_user_email" value="{{ old('ak_user_email') }}" required autofocus>

                                @if ($errors->has('ak_user_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ak_user_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ak_user_password') ? ' has-error' : '' }}">
                            <label for="ak_user_password" class="col-md-4 control-label">ak_user_password</label>

                            <div class="col-md-6">
                                <input id="ak_user_password" type="password" class="form-control" name="ak_user_password" required>

                                @if ($errors->has('ak_user_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ak_user_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your ak_user_password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
