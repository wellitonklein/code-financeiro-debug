@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s8 offset-s2 z-depth-2">
                <h3 class="center">Financeiro Admin</h3>
                <div class="panel panel-default">
                    <form method="POST" action="{{ env('URL_ADMIN_LOGIN') }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="input-field col s12">
                                <?php $messageError = $errors->has('email') ? "data-error='{$errors->first('email')}" : null ?>
                                <input id="email" type="email" class="validate {{$messageError? 'invalid':$messageError}}" name="email" value="{{ old('email') }}" required autofocus>
                                <label for="email" {!! $messageError !!}>E-Mail</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <?php $messageError = $errors->has('password') ? "data-error='{$errors->first('password')}" : null ?>
                                <input id="password" type="password" class="validate {{$messageError? 'invalid':$messageError}}" name="password" value="{{ old('password') }}" required autofocus>
                                <label for="password" {!! $messageError !!}>Password</label>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="input-field">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Lembrar-me
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
