<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comentario; 
use App\Http\Requests\StoreComentario;

class ComentariosController extends Controller
{
    public function store(StoreComentario $request){

        $dados = $request->all();
        $dados['user_id'] = Auth::user()->id;

        Comentario::create($dados);

        return redirect()->back()
            ->with('mensagem','Comentário enviado com sucesso!');
    }

    public function destroy(Comentario $comentario){
        $comentario->delete();

        return redirect()->back()
            ->with('mensagem', 'Comentário deletado com sucesso');

    }
}
