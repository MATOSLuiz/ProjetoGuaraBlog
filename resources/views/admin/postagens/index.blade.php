@extends('admin.layout.app')

@section('breadcrumb')  
<li class="breadcrumb-item" aria-current="page">Lista de Postagens</li>
    
@endsection

@section('title','Home/Lista de Postagens')

@section('conteudo')
    <h1 class="Display-3">Bem vindo ao GuaraBlog!</h1>
    <a href= "{{ route('postagens.create') }}" class="btn btn-success">Criar Nova Postagem</a>
    <hr>

    @if ($mensagem = Session::get('mensagem'))

    <div class="alert alert-success">
        <p>{{ $mensagem }}</p>
    </div>
        
    @endif
        <div class="row">
            @foreach ($postagens as $postagem)
                <div class="postagem col-4 mt-5">
                    <div class="card">
                        <div class="card-title">
                            <h5>{{ $postagem->titulo }}</h5>
                        </div>
                        <div class="card-subtitle">
                            <p>{{ $postagem->subtitulo }}</p>
                        </div>
                        <div class="card-footer">
                            <form onsubmit="return confirm('Deseja Realmente apagar esta postagem?')" action="{{ route('postagens.destroy', $postagem->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="{{ route('postagens.show', $postagem->id) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('postagens.edit', $postagem->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <button class="btn btn-sm btn-danger" type="submit">Apagar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection