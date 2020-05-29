<nav>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="/">Inici</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ESO</a>
      <div class="dropdown-menu">
      @foreach($pagaments as $key => $pagament)
        @if($pagament->nivell == 'ESO')
          @if($pagament->data_fi > date('Y-m-d'))
            <a class="dropdown-item" href="{{ url('/pagament/'.$pagament->nivell.'/'.$pagament->id) }}">{{$pagament->titol}}</a>
          @endif
        @endif
      @endforeach
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Batxillerat</a>
      <div class="dropdown-menu">
      @foreach($pagaments as $key => $pagament)
        @if($pagament->nivell == 'BAT')
          @if($pagament->data_fi > date('Y-m-d'))
            <a class="dropdown-item" href="{{ url('/pagament/'.$pagament->nivell.'/'.$pagament->id) }}">{{$pagament->titol}}</a>
          @endif
        @endif
      @endforeach
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cicles Formatius</a>
      <div class="dropdown-menu">
      @foreach($pagaments as $key => $pagament)
        @if($pagament->nivell == 'CF')
          @if($pagament->data_fi > date('Y-m-d'))
            <a class="dropdown-item" href="{{ url('/pagament/'.$pagament->nivell.'/'.$pagament->id) }}">{{$pagament->titol}}</a>
          @endif
        @endif
      @endforeach
      </div>
      </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Professorat</a>
        <div class="dropdown-menu">
          @foreach($pagaments as $key => $pagament)
            @if($pagament->nivell == 'PR')
              @if($pagament->data_fi > date('Y-m-d'))
                <a class="dropdown-item" href="{{ url('/pagament/'.$pagament->nivell.'/'.$pagament->id) }}">{{$pagament->titol}}</a>
              @endif
            @endif
          @endforeach
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/login">Login</a>
    </li>
  </ul>
</nav>