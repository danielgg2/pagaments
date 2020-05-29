@extends('layouts.admin_master')

@section('content')
	
	<form action="{{ url('/administracio/cursos/editar/'.$curs->id) }}" method="post">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
		<label for="curs">Nom curs</label>
		<input type="text" name="curs" value="{{$curs->curs}}">
		<input type="submit" value="Emmagatzemar canvis"><br>
		@if ($errors->has('curs'))
            <br><span class="alert alert-danger">
                <strong>{{ $errors->first('curs') }}</strong>
            </span><br><br>
        @endif
	</form>

@endsection