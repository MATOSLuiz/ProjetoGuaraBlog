@extends('admin.layout.app')

@section('title','BlogEtec||Criar Nova Postagem')

@section('conteudo')

    <h1 class="text-secondary">Criar Nova Postagem</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="titulo" class="text-primary">Título da Postagem:</label>
            <input type="text" class="form-control" name="titulo" id="titulo">
        </div>

        <div class="form-group">
            <label for="subtitulo" class="text-primary">Subtítulo:</label>
            <input type="text" class="form-control" name="subtitulo" id="subtitulo">
        </div>

        <div class="form-group">
            <label for="texto" class="text-primary">Texto da Postagem:</label>
            <textarea class="form-control" name="texto" id="" cols="30" rows="10"></textarea>
        </div>
    </form> 
@endsection