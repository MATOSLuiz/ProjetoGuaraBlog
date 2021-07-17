<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        return view('site.home');
    }

    public function cadastroUsuario(){
        $etecs = DB::table('etecs')->orderBy('codigo')->get();

        return view('site.cadastroUsuario',compact('etecs'));
    }

    public function login(){
        return view('site.login');
    }

    
}
