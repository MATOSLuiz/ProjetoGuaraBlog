@extends('admin.layout.app')

@section('title','Home/Lista de Postagens')

@section('conteudo')
    <h1 class="Display-3">Bem vindo ao BlogEtec!</h1>

    <a href= "{{ route('postagens.create') }}" class="btn btn-success">Criar Nova Postagem</a>
@endsection