@extends('layouts.master')

@section('content')

                <h2>Recuperar contrasenya</h2>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('usuari') ? ' has-error' : '' }}">
                            <label for="usuari" class="col-md-4 control-label">Nom d'usuari</label>

                            <div class="col-md-6">
                                <input id="usuari" type="text" class="form-control" name="usuari" value="{{ $usuari or old('usuari') }}" required autofocus>

                                @if ($errors->has('usuari'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usuari') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contrasenya</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar contrasenya</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Canviar contrasenya
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            
@endsection
