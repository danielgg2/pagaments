@extends('layouts.master')

@section('content')

            <h2>Login</h2>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('usuari') ? ' has-error' : '' }}">
                            <label for="usuari" class="col-md-4 control-label">Usuari</label>

                            <div class="col-md-6">
                                <input id="usuari" type="text" class="form-control" name="usuari" value="{{ old('usuari') }}" required autofocus>

                                @if ($errors->has('usuari'))
                                    <br><span class="alert alert-danger">
                                        <strong>{{ $errors->first('usuari') }}</strong>
                                    </span><br><br>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contrasenya</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <br><span class="alert alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span><br><br>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recorda'm
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Entrar
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Has oblidat la contrasenya?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
           
@endsection
