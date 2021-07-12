@extends('admin.layout.app')

@section('title','BlogEtec||Visualizar Postagem')

@section('conteudo')

<div id="infopostagem" class="list-group">
  <h1 class="display-4">{{ $postagem->titulo }}</h1>
  <li class="list-group-item list-group-item-action">{{ $postagem->subtitulo }}</li>
  <li class="list-group-item list-group-item-action">{{ $postagem->texto }}</li>
</div>
   </ol>
@endsection