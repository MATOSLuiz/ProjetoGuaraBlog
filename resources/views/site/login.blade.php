<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/site.css') }}">

    <title>@yield('titulo')</title>
  </head>

  <main class="container">
        <form class="form-signin" method="POST" action="{{ route('entrar') }}">
            @csrf
            <img class="mb-4" src="{{ url('storage/imagens/LOGOETEC.png') }}" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                   <ol>
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ol>      
                </div>  
            @endif

            <label for="email" class="sr-only">Endereço de email</label>
            <input name="email" type="email" id="email" class="form-control" placeholder="Seu email" required autofocus>

            <label for="password" class="sr-only">Senha</label>
            <input name="password" type="password" id="password" class="form-control" placeholder="Senha" required>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Lembrar de mim
                        </label>
                    </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            
            <p class="mt-5 mb-3 text-muted text-justify">&copy; 2017-2018</p>
        </form>
  </main>

        <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>