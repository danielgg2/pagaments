@extends('layouts.admin_master')

@section('content')

<a class="btn btn-primary" href="{{ url('/administracio/cursos/create') }}">Afegir nova</a>
<div class="overflow-auto small row">

<table class="table text-center small table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Curs</th>
    </tr>
  </thead>
  <tbody>
@foreach($cursos as $key => $curs)
  <tr>
    <td>{{$curs->id}}</td>
    <td>{{$curs->curs}}</td>
    <td class="sm"><a class="btn btn-warning" href="{{ url('/administracio/cursos/editar/'.$curs->id) }}">Editar</a></td>
    <td><form method="post" action="{{ url('/administracio/cursos/eliminar/'.$curs->id) }}">
      {{csrf_field()}}
      <button class="btn btn-danger" type="submit" onclick="return confirm('Estas segur d\'eliminar aquest curs?')">Eliminar</button>
    </form></td>
  </tr>
@endforeach
  </tbody>
</table>
</div>
{!! $cursos->render() !!}
@endsection