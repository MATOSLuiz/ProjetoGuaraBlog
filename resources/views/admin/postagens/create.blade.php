@extends('admin.layout.app')

@section('title','BlogEtec||Criar Nova Postagem')

@section('conteudo')

    <h1 class="text-secondary">Criar Nova Postagem</h1>

    @if ($errors->any())
        <p class="text-danger"><strong>Atenção! </strong>As informações inseridas não são válidas</p>
        
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
         </ul>
    @endif
   
    <form action="{{ route('postagens.store') }}" method="POST">
    @csrf
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

        <button class="btn btn-primary" type="submit">Postar</button>
    </form> 
@endsection