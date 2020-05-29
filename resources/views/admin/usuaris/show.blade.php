@extends('layouts.admin_master')

@section('content')

<a class="btn btn-primary" href="{{ url('/administracio/usuaris/create') }}">Afegir nou</a>
<div class="overflow-auto small row">

<table class="table text-center small table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Correu electronic</th>
      <th>Username</th>
      <th>Contrasenya</th>
    </tr>
  </thead>
  <tbody>
@foreach($usuaris as $key => $usuari)
  <tr>
    <td>{{$usuari->id}}</td>
    <td>{{$usuari->email}}</td>
    <td>{{$usuari->usuari}}</td>
    <td>{{$usuari->contrasenya}}</td>
    <td><a class="btn btn-warning" href="{{ url('/administracio/usuaris/editar/'.$usuari->id) }}">Editar</a></td>
    <td><form method="post" action="{{ url('/administracio/usuaris/eliminar/'.$usuari->id) }}">
      {{csrf_field()}}
      <button class="btn btn-danger" type="submit" onclick="return confirm('Estas segur d\'eliminar aquest usuari?')">Eliminar</button>
    </form></td>
  </tr>
@endforeach
  </tbody>
</table>
</div>
{!! $usuaris->render() !!}
@endsection