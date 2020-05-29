@extends('layouts.admin_master')

@section('content')
	
	<form action="{{ url('/administracio/pagaments/create') }}" method="post">
	{{ csrf_field() }}
		<label for="categoria_id">Categoria</label><br>
		<select name="categoria_id">
			@foreach($categories as $key => $categoria)
        @if($categoria->id == old('categoria_id'))
          <option value="{{ $categoria->id}}" selected>{{$categoria->categoria}}</option>
        @else
          <option value="{{ $categoria->id}}">{{$categoria->categoria}}</option>
        @endif
      @endforeach  
		</select><br>
		<label for="compte_id">Compte</label><br>
		<select name="compte_id">
    @foreach($comptes as $key => $compte)
        @if($compte->id == old('compte_id'))
          <option value="{{ $compte->id}}" selected>{{$compte->compte}}</option>
        @else
          <option value="{{ $compte->id}}">{{$compte->compte}}</option>
        @endif
      @endforeach
		</select><br>
		<label for="curs_id">Curs</label><br>
		<select name="curs_id">
			@foreach($cursos as $key => $curs)
        @if($curs->id == old('curs_id'))
          <option value="{{ $curs->id }}" selected>{{$curs->curs}}</option>
        @else
          <option value="{{ $curs->id }}">{{$curs->curs}}</option>
        @endif
      @endforeach
		</select><br>
    <input type="hidden" name="usuari_id" value="{{ auth()->id() }}">
		<label for="nivell">Nivell</label><br>
		<select name="nivell">
    <?php $nivells = array("ESO", "BAT", "CF", "PR"); ?>
    @foreach($nivells as $key => $nivell)
      @if($nivell === old('nivell'))
        <option value="{{$nivell}}" selected>{{$nivell}}</option>
      @else
        <option value="{{$nivell}}">{{$nivell}}</option>
      @endif
    @endforeach
		</select><br>
		<label for="comanda">Comanda</label><br>
		<input type="text" name="comanda" value="{{ old('comanda') }}"><br>
    @if ($errors->has('comanda'))
            <br><span class="alert alert-danger">
                <strong>{{ $errors->first('comanda') }}</strong>
            </span><br><br>
    @endif
		<label for="titol">Títol</label><br>
		<input type="text" name="titol" value="{{ old('titol') }}"><br>
    @if ($errors->has('titol'))
            <br><span class="alert alert-danger">
                <strong>{{ $errors->first('titol') }}</strong>
            </span><br><br>
    @endif
		<label for="descripcio">Descripció</label><br>
		<textarea class="my-editor" name="descripcio">{{ old('descripcio') }}</textarea><br>
    @if ($errors->has('descripcio'))
            <br><span class="alert alert-danger">
                <strong>{{ $errors->first('descripcio') }}</strong>
            </span><br><br>
    @endif
		<label for="preu">Preu</label><br>
		<input type="number" step="000000.01" name="preu" value="{{ old('preu') }}"><br>
    @if ($errors->has('preu'))
            <br><span class="alert alert-danger">
                <strong>{{ $errors->first('preu') }}</strong>
            </span><br><br>
    @endif
		<label for="data_inici">Data inici</label><br>
		<input type="date" name="data_inici" value ="{{ old('data_inici') }}"><br>
    @if ($errors->has('data_inici'))
            <br><span class="alert alert-danger">
                <strong>{{ $errors->first('data_inici') }}</strong>
            </span><br><br>
    @endif
		<label for="data_fi">Data fi</label><br>
		<input type="date" name="data_fi" value ="{{ old('data_fi') }}"><br>
    @if ($errors->has('data_inici'))
            <br><span class="alert alert-danger">
                <strong>{{ $errors->first('data_inici') }}</strong>
            </span><br><br>
    @endif
		<label for="estat">Estat</label><br>
		<select name="estat">
    <?php $estats = array("Actiu", "Inactiu"); ?>
    @foreach($estats as $key => $estat)
      @if($estat === old('estat'))
        <option value="{{$estat}}" selected>{{$estat}}</option>
      @else
        <option value="{{$estat}}">{{$estat}}</option>
      @endif
    @endforeach
		</select><br><br>

		<input type="submit" value="Afegir">
	</form>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
@endsection