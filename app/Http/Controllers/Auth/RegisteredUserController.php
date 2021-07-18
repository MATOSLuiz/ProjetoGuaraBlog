<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    
    public function edit(){
        $etecs = DB::table('etecs')->orderBy('codigo', 'ASC')->get();
        $usuario = Auth::user();

        return view('admin.user.edit', compact('etecs','usuario'));
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'foto_perfil' => 'nullable|image'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        if($request->foto_perfil && $request->foto_perfil->isValid()){
            $nome_imagem = Str::of($request->name . date('dmYHis'))->slug('-');
            $extensao = $request->foto_perfil->getClientOriginalExtension();
            $nome_imagem = $nome_imagem . '.' . $extensao;

            $imagem = $request->foto_perfil->storeAs('usuario', $nome_imagem);
            $data['foto_perfil'] = $imagem;
        }

        $user = User::create($data);

        event(new Registered($user));

        Auth::login($user);

        return redirect()
            ->route('admin.home')
            ->with('mensagem', 'Cadastro criado com sucesso!');
    }
}
