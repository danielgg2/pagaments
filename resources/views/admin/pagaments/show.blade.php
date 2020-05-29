@extends('layouts.admin_master')

@section('content')

<a class="btn btn-primary" href="{{ url('/administracio/pagaments/create') }}">Afegir nou</a>
<div id="divpag" class="overflow-auto small row">
<table class="table text-center small table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>ID Categoria</th>
      <th>ID Compte</th>
      <th>ID Curs</th>
      <th>ID Usuari</th>
      <th>Nivell</th>
      <th>Comanda</th>
      <th>Titol</th>
      <th>Descripció</th>
      <th>Preu</th>
      <th>Data inici</th>
      <th>Data fi</th>
      <th>estat</th>
    </tr>
  </thead>
  <tbody>
@foreach($pagaments as $key => $pagament)
  <tr>
    <td>{{$pagament->id}}</td>
    <td>{{$pagament->categoria_id}}</td>
    <td>{{$pagament->compte_id}}</td>
    <td>{{$pagament->curs_id}}</td>
    <td>{{$pagament->usuari_id}}</td>
    <td>{{$pagament->nivell}}</td>
    <td>{{$pagament->comanda}}</td>
    <td><span class="d-inline-block text-truncate">{{$pagament->titol}}</span></td>
    <td><span class="d-inline-block text-truncate">{{$pagament->descripcio}}</span></td>
    <td>{{$pagament->preu}}</td>
    <td>{{$pagament->data_inici}}</td>
    <td>{{$pagament->data_fi}}</td>
    <td>{{$pagament->estat}}</td>
    <td><a class="btn btn-warning" href="{{ url('/administracio/pagaments/editar/'.$pagament->id) }}">Editar</a></td>
    <td><form method="post" action="{{ url('/administracio/pagaments/eliminar/'.$pagament->id) }}">
      {{csrf_field()}}
      <button class="btn btn-danger" type="submit" onclick="return confirm('Estas segur d\'eliminar aquest pagament?')">Eliminar</button>
    </form></td>
  </tr>
@endforeach
  </tbody>
</table>
</div>
  {!! $pagaments->render() !!}


@endsection