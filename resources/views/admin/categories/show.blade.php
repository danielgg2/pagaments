@extends('layouts.admin_master')

@section('content')
<a class="btn btn-primary" href="{{ url('/administracio/categories/create') }}">Afegir nova</a>
<div class="overflow-auto small row">
<table class="table text-center small table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nom categoria</th>
    </tr>
  </thead>
  <tbody>
@foreach($categories as $key => $categoria)
  <tr>
    <td>{{$categoria->id}}</td>
    <td>{{$categoria->categoria}}</td>
    <td class="sm"><a class="btn btn-warning" href="{{ url('/administracio/categories/editar/'.$categoria->id) }}">Editar</a></td>
    <td><form method="post" action="{{ url('/administracio/categories/eliminar/'.$categoria->id) }}">
      {{csrf_field()}}
      <button class="btn btn-danger" type="submit" onclick="return confirm('Estas segur d\'eliminar aquesta categoria?')">Eliminar</button>
    </form></td>
  </tr>
@endforeach
  </tbody>
</table>
</div>
{!! $categories->render() !!}
@endsection