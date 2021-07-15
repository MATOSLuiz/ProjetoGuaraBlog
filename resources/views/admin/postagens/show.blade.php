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
        <h1 class="display-1 text-center">
            {{ $postagem->titulo }}
        </h1>
    </div>
</div>

<h2 class="text-muted" >
    {{ $postagem->subtitulo }}
</h2>

<p>
    {{ $postagem->texto }}
</p>
  

@endsection