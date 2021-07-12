<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostagemController extends Controller
{
    public function index(){
        return view('admin.postagens.index');
    }

    public function create(){
        return view('admin.postagens.create');
    }
}
