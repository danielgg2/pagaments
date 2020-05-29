@extends('layouts.admin_master')

@section('content')
	
	<form action="{{ url('/administracio/categories/create') }}" method="post">
	{{ csrf_field() }}
		<label for="categoria">Nom categoria</label>
		<input type="text" name="categoria" value="{{ old('categoria') }}">
		<input type="submit" value="Afegir"><br>
		@if ($errors->has('categoria'))
            <br><span class="alert alert-danger">
                <strong>{{ $errors->first('categoria') }}</strong>
            </span><br><br>
        @endif
	</form>

@endsection