<?php

namespace App\Http\Controllers\Api;

use App\Mail\RecuperarSenha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;
use App\Models\UsuariosExtras;
use App\Rules\Cpf;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

/**
 * @package API
 * Classe responsável por Controlar as requisições da API envolvendo usuário
 */
class UsuariosController extends ApiController {
    
    /** Loga o usuário */
    public function logar(Request $request) {
        $usuario = Usuario::where('email', $request->email)->firstOrFail(); //Senão achar retorna 404
        
        if ($usuario != null && Hash::check($request->senha, $usuario->senha) ) {
            $jwt = JWT::encode(['id' => $usuario->id, 'admin' => $usuario->admin], config('jwt.senha'), 'HS256');
            return response()->json(['usuario' => $usuario, 'jwt' => $jwt], 200);
        }

        return response()->json('Usuário não encontrado', 404);

    }


    /** Cadastra um novo usuário */
    public function cadastrar(Request $request) {

        $validation = Validator::make($request->all(), [
            'nome'  => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|min:6'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        } else {
            $dadosUsuarios = $request->only(['nome', 'email', 'senha']);
            
            $dadosUsuarios['senha'] = bcrypt($dadosUsuarios['senha']);
            $usuario = Usuario::create($dadosUsuarios);

            $dadosExtras = $request->except(['nome', 'email', 'senha', 'admin']);
            
            $dadosExtras['data_nascimento'] = explode('/', $dadosExtras['data_nascimento']);
            $dadosExtras['data_nascimento'] = implode('-', array_reverse($dadosExtras['data_nascimento']));
            $dadosExtras['usuario_id'] = $usuario->id;

            $extras = UsuariosExtras::create($dadosExtras);

            $usuario = $usuario->toArray();
            $usuario['extras'] = $extras->toArray();

            
            $jwt = JWT::encode(['id' => $usuario['id']], config('jwt.senha'), 'HS256');
            return response()->json([
                'usuario'   => $usuario,
                'jwt'       => $jwt
            ], 201);
        }
    }

    /** Atualiza senha */
    public function atualizarDados(Request $request) {
        //Busca o usuário pelo JWT
        $usuarioID = $this->getUsuarioID($request);
        $usuario = Usuario::findOrFail($usuarioID);
        $extras = UsuariosExtras::where('usuario_id', $usuarioID)->first();

        //Cria validação  
        $validation = Validator::make($request->all(), [
            'nome'  => 'required',
            'senha' => 'nullable|min:6'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        } else {
            $dadosUsuarios = $request->only(['nome', 'senha']);
            
            if (isset($dadosUsuarios['senha']))
                $dadosUsuarios['senha'] = bcrypt($dadosUsuarios['senha']);
            
            $usuario->fill($dadosUsuarios);
            $usuario->save();

            //Dados extras
            $dadosExtras = $request->except(['nome', 'email', 'senha', 'admin', 'usuario_id']);
            
            $dadosExtras['data_nascimento'] = explode('/', $dadosExtras['data_nascimento']);
            $dadosExtras['data_nascimento'] = implode('-', array_reverse($dadosExtras['data_nascimento']));
            
            $extras->fill($dadosExtras);
            $extras->save();

            $usuario = $usuario->toArray();
            $usuario['extras'] = $extras->toArray();

            return response()->json(['usuario'=> $usuario], 200);
        }
    }

  
    /**
     * Busca dados do usuário logado
     * @param $id ID do usuário
     */
    public function buscarDados(Request $request) {
        $id = $this->getUsuarioID($request);
        $usuario = Usuario::with('extras')->with('contatos')->findOrFail($id);
        return response()->json($usuario, 200);
    }
  

     /** Recupera a senha do usuário */
     public function recuperarSenha(Request $request) {
        
        $usuario = Usuario::where('email', $request->email)->firstOrFail();

        $token = JWT::encode([
            'id'    => $usuario->id,
            'exp'   => time() + (60*60*2) //Link expira em 2h
        ], config('jwt.senha'), 'HS256');
        //echo $usuario->email;die;
        Mail::to($usuario->email)->send(new RecuperarSenha($usuario, $token));

        return response()->json(['sucesso' => true], 200);
    }
}
