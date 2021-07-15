@extends('admin.layout.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('postagens.index') }}">Postagens</a></li>   
    <li class="breadcrumb-item" aria-current="page">Editar Postagem</li> 
@endsection

@section('title','BlogEtec||Criar Nova Postagem')

@section('conteudo')

    <h1>Criar Nova Postagem</h1>

    @if ($errors->any())
        <p class="text-danger"><strong>Atenção! </strong>As informações inseridas não são válidas</p>
        
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
         </ul>
    @endif
   
    <form enctype="multipart/form-data" action="{{ route('postagens.store') }}" method="POST">
    @csrf
        <div class="form-group">
            <label for="titulo">Título da Postagem:</label>
            <input value="{{ $postagem->titulo ?? old('titulo') }}" type="text" class="form-control" name="titulo" id="titulo">
        </div>

        <div class="form-group">
            <label for="subtitulo">Subtítulo:</label>
            <input value="{{ $postagem->subtitulo ?? old('subtitulo') }}" type="text" class="form-control" name="subtitulo" id="subtitulo">
        </div>

        <div class="form-group">
            <label for="texto">Texto da Postagem:</label>
            <textarea class="form-control" name="texto" id="" cols="30" rows="10">{{ $postagem->texto ?? old('texto') }}</textarea>
        </div>

        <div class="form-group">
            <label for="imagem">Selecione a Imagem principal:</label>
            <input type="file" class="form-control-file" id="imagem" name="imagem">
        </div>

        <button class="btn btn-outline-primary" type="submit">Postar</button>
    </form> 
@endsection