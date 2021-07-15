<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostagens;
use App\Models\postagem;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostagemController extends Controller
{
    public function index(){
        $postagens = postagem::all();
        return view('admin.postagens.index', compact('postagens'));
    }

    public function create(){
        return view('admin.postagens.create');
    }

    public function store(StoreUpdatePostagens $request){
        $dados = $request->all();

        if($request->imagem && $request->imagem->isValid()) {
            $nome_imagem = Str::of($request->titulo . date('dmYHis'))->slug('-') . '.' . 
            $request->imagem->getClientOriginalExtension();  

            $imagem = $request->imagem->storeAs('postagem', $nome_imagem);
            $dados['imagem'] = $imagem;
                
        }

        $postagem = Postagem::create($dados);
        return redirect()
            ->route('postagens.show', $postagem->id)
            ->with('mensagem','Publicação Postada com sucesso!');
    }

    public function update(StoreUpdatePostagens $request, $id){
        if(!$postagem = postagem::find($id))
            return redirect()->back();

        $dados = $request->all();

        if ($request->imagem && $request->imagem->isValid()) {
           if(Storage::exists($postagem->imagem))
                Storage::delete($postagem->imagem);
           
            $nome_imagem = Str::of($request->titulo . date('dmYHis'))->slug('-') . '.' .
            $request->imagem->getClientOriginalExtension();

            $imagem = $request->imagem->storeAs('postagem', $nome_imagem);
            $dados['imagem'] = $imagem;
        }

        $postagem->update($dados);

        return redirect()
        ->route('postagens.edit', $postagem->id)
        ->with('mensagem','Postagem editada com sucesso');
    }

    public function show($id){
        $postagem = postagem::find($id);

        if(!$postagem)
            return redirect()->route('postagens.index');
        return view('admin.postagens.show', compact('postagem'));
    }

    public function edit($id){
        $postagem = postagem::find($id); 
        
        if (!$postagem)
            return redirect()->back();
        return view('admin.postagens.edit', compact('postagem'));
    
    }

    public function destroy($id){
        $postagem = postagem::find($id);

        if (!$postagem) 
            return redirect()->route('postagens.index');

        if (Storage::exists($postagem->imagem))
            Storage::delete($postagem->imagem);

            $postagem->delete();

            return redirect()
                ->route('postagens.index')
                ->with('mensagem','Postagem deletada com sucesso!');
        
    }
}
