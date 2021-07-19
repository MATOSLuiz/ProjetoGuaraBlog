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

    public function destroy($id){
        $comentario = Comentario::find($id);

        if (!$comentario) 
            return redirect()->route('postagens.index');
        
        if (Auth::user()->id <> $comentario->user->id)
            return redirect()->route('postagens.index')
                ->with('mensagem', 'Você não pode apagar comentários de outras pessoas');
        

        $comentario->delete();

        return redirect()->back()
            ->with('mensagem', 'Comentário deletado com sucesso');

    }
}
