@extends('layouts.admin_master')

@section('content')
	
	<form action="{{ url('/administracio/usuaris/create') }}" method="post">
	{{ csrf_field() }}
		<label for="email">Correu electronic</label><br>
		<input type="email" name="email" value="{{ old('email') }}"><br>
		@if ($errors->has('email'))
            <br><span class="alert alert-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span><br><br>
    	@endif
		<label for="usuari">Nom d'usuari</label><br>
		<input type="text" name="usuari" value="{{ old('usuari') }}"><br>
		@if ($errors->has('usuari'))
            <br><span class="alert alert-danger">
                <strong>{{ $errors->first('usuari') }}</strong>
            </span><br><br>
    	@endif
		<label for="contrasenya">Contrasenya</label><br>
		<input type="password" name="contrasenya" ><br>
		@if ($errors->has('contrasenya'))
            <br><span class="alert alert-danger">
                <strong>{{ $errors->first('contrasenya') }}</strong>
            </span><br><br>
    	@endif
		<input type="submit" value="Afegir">
	</form>

@endsection