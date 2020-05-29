@extends('layouts.admin_master')

@section('content')
	
	<form action="{{ url('/administracio/categories/editar/'.$categoria->id) }}" method="post">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
		<label for="categoria">Nom categoria</label>
		<input type="text" name="categoria" value="{{$categoria->categoria}}">
		<input type="submit" value="Emmagatzemar canvis"><br>
		@if ($errors->has('categoria'))
            <br><span class="alert alert-danger">
                <strong>{{ $errors->first('categoria') }}</strong>
            </span><br><br>
        @endif
	</form>

@endsection