<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Contato;
use Illuminate\Support\Facades\Validator;

/**
 * @package API
 * Classe apra gerenciar os contatos de ajuda do usuário
 */
class ContatosController extends ApiController {
    /** Cadastra um novo contato */
    public function cadastrar(Request $request) {
        $usuarioID = $this->getUsuarioID($request);
        
        //VALIDA
        $validations = Validator::make($request->all(), [
            'nome'              => 'required',
            'telefone'          => 'required',
            'relacionamento'    => 'required|integer',
        ]);

        if ($validations->fails()) return response()->json($validations->errors(), 400);

        //CADASTRA
        $dados = $request->all();
        $dados['usuario_id'] = $usuarioID;
        $contato = Contato::create($dados);
        return response()->json($contato, 201);
    }

    /** Lista todos os contatos de um usuário */
    public function listar(Request $request) {
        $usuarioID = $this->getUsuarioID($request);
        $contatos = Contato::where('usuario_id', $usuarioID)->get();
        return response()->json(['contatos' => $contatos], 200);
    }

    /** Exclui o contato contato */
    public function excluir(Request $request, int $id) {
        $usuarioID = $this->getUsuarioID($request);
        $contato = Contato::where('usuario_id', $usuarioID)->where('id',  $id)->firstOrFail();
        $contato->delete();
        return response()->json('Excluído com sucesso', 200);
    }
}
