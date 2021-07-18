@extends('admin.layout.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('postagens.index') }}">Postagens</a></li>   
    <li class="breadcrumb-item" aria-current="page">{{ $postagem->titulo }}</li> 
@endsection

@section('title','BlogEtec||Visualizar Postagem')

@section('conteudo')

<div class="row">
    <div class="col">
        <img class="img img-thumbnail img-fluid" src="{{ url("storage/{$postagem->imagem}") }}" alt="{{ $postagem->titulo }}">
    </div>
    <div class="col">
        <h1 class="display-2 text-center">
            {{ $postagem->titulo }}
        </h1>
    </div>
</div>

<h2 class="text-muted" >
    {{ $postagem->subtitulo }}
</h2>

<p>
    {!! nl2br($postagem->texto) !!}
</p>

<hr>

<h2>Comentários</h2>

<div class="comentarios">
    <div class="row">

    @foreach ($postagem->comentarios as $comentario)
        
            <div class="col-3">
                <p class="imagem">
                    {{ $comentario->initials() }}
                </p>
            </div>
            <div class="col-9">
                <p class="comentario">
                    {{ $comentario->comentario }}
                </p>
            </div>
            <div class="col-12">
                <p class="text-muted">
                        por {{ $comentario->user->name }} em {{ $comentario->created_at }}
                </p>
            </div>
        @endforeach
    </div>
</div>

    @if ($errors->any())
        <p class="text-danger"><strong>Atenção! </strong>As informações inseridas não são válidas</p>
        
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
         </ul>
    @endif

   @if ($mensagem = Session::get('mensagem'))

   <div class="alert alert-success">
       <p>{{ $mensagem }}</p>
   </div>
   
   @endif

<form method="POST" action="{{ route('comentarios.store') }}">
@csrf

    <input type="hidden" name="postagem_id" value="{{ $postagem->id }}">

    <div class="form-group">
        <label for="comentario">Escreva um comentário:</label>
        <textarea class="form-control" name="comentario" id="comentario" rows="5">{{ old('comentario') }}</textarea>
    </div>

    <button class="btn btn-success" type="submit">Comentar</button>
</form>

@endsection