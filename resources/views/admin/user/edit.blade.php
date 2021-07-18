@extends('admin.layout.app')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Meu Perfil</a></li>
@endsection

@section('title', 'Admin - Perfil')

@section('conteudo')

    <h1>Atualizar Dados do cadastro</h1>
        @if ($errors->any())
            <p class="text-danger"><strong>Atenção! </strong>As informações inseridas não são válidas</p>
        
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    <form class="form" action="{{ route('site.usuarios.store') }}" method="POST">
    @csrf   
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $usuario->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $usuario->email }}">
        </div>

        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" value="{{ $usuario->data_nascimento }}">
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" name="password" id="password" class="form-control">
                 </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="password_confirmation">Confirme a senha:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="etec_id">Selecione sua ETEC</label>
                    <select class="form-control" name="etec_id" id="etec_id">
                    
                        @foreach ($etecs as $etec)
                            <option value="{{ $etec->id }}">{{ $etec->codigo . '-' . $etec->nome }}</option>        
                        @endforeach
                    </select>   
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="curso">Me conte sobre você na ETEC</label>
                    <textarea name="curso" id="control" cols="30" rows="10" class="form-control">{{ $usuario->curso }}</textarea>
                </div>
            </div>
        </div>     

        <div class="form-group">
             @if (!empty($usuario->foto_perfil))
                <img class="img img-thumbnail d-block" width="200" height="200" src="{{ url("storage/{$usuario->foto_perfil}" ) }}" alt="{{ $usuario->name }}">
            @endif
            <label for="foto_perfil">Selecione sua foto de perfil:</label>
            <input class="form-control" type="file" name="foto_perfil" id="foto_perfil">
        </div>

        <button type="submit" class="btn btn-outline-success float-right" >Cadastrar</button>

    </form>
    
@endsection