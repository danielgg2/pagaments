@extends('layouts.admin_master')

@section('content')
	
	<form action="{{ url('/administracio/usuaris/editar/'.$usuari->id) }}" method="post">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
		<label for="email">Correu electronic</label>
		<input type="text" name="email" value="{{$usuari->email}}">
		@if ($errors->has('email'))
            <br><span class="alert alert-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span><br><br>
    	@endif
		<label for="usuari">Nom d'usuari</label>
		<input type="text" name="usuari" value="{{$usuari->usuari}}">
		@if ($errors->has('usuari'))
            <br><span class="alert alert-danger">
                <strong>{{ $errors->first('usuari') }}</strong>
            </span><br><br>
    	@endif
		<label for="contrasenya">Contrasenya</label>
		<input type="text" name="contrasenya" value="{{$usuari->contrasenya}}">
		@if ($errors->has('contrasenya'))
            <br><span class="alert alert-danger">
                <strong>{{ $errors->first('contrasenya') }}</strong>
            </span><br><br>
    	@endif
		<input type="submit" value="Emmagatzemar canvis">
	</form>

@endsection