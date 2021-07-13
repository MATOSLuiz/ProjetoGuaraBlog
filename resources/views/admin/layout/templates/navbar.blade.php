<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('admin.home') }}">GuaraBlog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarguarablogadmin" aria-controls="navbarguarablogadmin" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarguarablogadmin">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.home') }}">Inicio<span class="sr-only">(current)</span></a>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="{{ route('postagens.index') }}" id="PostagensDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Postagens
        </a>
        <div class="dropdown-menu" aria-labelledby="PostagensDropdown">
          <a class="dropdown-item" href="{{ route('postagens.create') }}">Criar Nova Postagem</a>
          <a class="dropdown-item" href="{{ route('postagens.index') }}">Lista de Postagens</a>
          {{-- <divclass="dropdown-divider"></div> --}}
        </div>
      </li>
    {{--<li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>--}}
    </ul>

    {{--  <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>--}}

  </div>
</nav>