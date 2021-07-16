@extends('site.index')

@section('titulo', 'Cadastro de Usuário')

@section('conteudo')

    <h1>Novo Usuário|GuaraBlog</h1>
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
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="text" name="password" id="password" class="form-control">
                 </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="password_confirmation">Confirme a senha:</label>
                    <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="etec_id">Selecione sua ETEC</label>
                    <select class="form-control" name="etec_id" id="etec_id"></select>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="curso">Me conte sobre você na ETEC</label>
                    <textarea name="curso" id="control" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
        </div>     

        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" id="data_nascimento" class="form-control">
        </div>

        <div class="form-group">
            <label for="foto_perfil">Selecione sua foto de perfil:</label>
            <input class="form-control" type="file" name="foto_perfil" id="foto_perfil">
        </div>

        <button type="submit" class="btn btn-outline-success float-right" >Cadastrar</button>

    </form>
    
@endsection