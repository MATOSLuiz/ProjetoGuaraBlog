@extends('admin.layout.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('postagens.index') }}">Postagens</a></li>   
    <li class="breadcrumb-item" aria-current="page">{{ $postagem->titulo }}</li> 
@endsection

@section('title','BlogEtec||Visualizar Postagem')

@section('conteudo')

<div id="infopostagem" class="list-group">
  <h1 class="display-4">{{ $postagem->titulo }}</h1>
  <li class="list-group-item list-group-item-action">{{ $postagem->subtitulo }}</li>
  <li class="list-group-item list-group-item-action">{{ $postagem->texto }}</li>
</div>
   </ol>
@endsection