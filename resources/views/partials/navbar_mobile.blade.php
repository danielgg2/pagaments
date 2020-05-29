<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="/">Inici</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ESO</a>
          <div class="dropdown-menu desplega">
          @foreach($pagaments as $key => $pagament)
            @if($pagament->nivell == 'ESO')
              @if($pagament->data_fi > date('Y-m-d'))
                <a class="dropdown-item desplega" href="{{ url('/pagament/'.$pagament->nivell.'/'.$pagament->id) }}">{{$pagament->titol}}</a>
              @endif
            @endif
          @endforeach
          </div>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Batxillera</a>
        <div class="dropdown-menu desplega">
          @foreach($pagaments as $key => $pagament)
            @if($pagament->nivell == 'BAT')
              @if($pagament->data_fi > date('Y-m-d'))
                <a class="dropdown-item" href="{{ url('/pagament/'.$pagament->nivell.'/'.$pagament->id) }}">{{$pagament->titol}}</a>
              @endif
            @endif
          @endforeach
        </div>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cicles Formatius</a>
        <div class="dropdown-menu desplega">
        @foreach($pagaments as $key => $pagament)
            @if($pagament->nivell == 'CF')
              @if($pagament->data_fi > date('Y-m-d'))
                <a class="dropdown-item" href="{{ url('/pagament/'.$pagament->nivell.'/'.$pagament->id) }}">{{$pagament->titol}}</a>
              @endif
            @endif
          @endforeach
        </div>
        
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Professorat</a>
        <div class="dropdown-menu desplega">
          @foreach($pagaments as $key => $pagament)
            @if($pagament->nivell == 'PR')
              @if($pagament->data_fi > date('Y-m-d'))
                <a class="dropdown-item" href="{{ url('/pagament/'.$pagament->nivell.'/'.$pagament->id) }}">{{$pagament->titol}}</a>
              @endif
            @endif
          @endforeach
        </div>
      </li>
      <li class="nav-item active">
          <a class="nav-link" href="/login">Login</a>
      </li>
    </ul>
  </div>
</nav>