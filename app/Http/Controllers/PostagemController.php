<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostagens;
use App\Models\postagem;
use Illuminate\Http\Request;

class PostagemController extends Controller
{
    public function index(){
        return view('admin.postagens.index');
    }

    public function create(){
        return view('admin.postagens.create');
    }

    public function store(StoreUpdatePostagens $request){
        $postagem = Postagem::create($request->all());
        return redirect()
        ->route('postagens.show', $postagem->id)
        ->with('mensagem','Publicação Postada com sucesso!');
    }

    public function update(StoreUpdatePostagens $request, $id){
        if(!$postagem = postagem::find($id))
            return redirect()->back();
        $postagem->update($request->all());

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
}
