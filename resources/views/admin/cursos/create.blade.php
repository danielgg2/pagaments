@extends('layouts.admin_master')

@section('content')
	
	<form action="{{ url('/administracio/cursos/create') }}" method="post">
	{{ csrf_field() }}
		<label for="curs">Curs</label>
		<input type="text" name="curs" value="{{ old('curs') }}">
		<input type="submit" value="Afegir"><br>
		@if ($errors->has('curs'))
            <br><span class="alert alert-danger">
                <strong>{{ $errors->first('curs') }}</strong>
            </span><br><br>
        @endif
	</form>

@endsection