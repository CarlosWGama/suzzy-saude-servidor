<?php

namespace App\Http\Controllers\Api;

use App\Models\PedidosAjuda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PedidosAjudaController extends ApiController {
    //

    //Realiza o cadastro de um pedido de ajuda de um usuário no sistema
    public function cadastrar(Request $request) {
        $usuarioID = $this->getUsuarioID($request);
        
        //VALIDA
        $validations = Validator::make($request->all(), [
            'origem'            => 'required|integer',
        ]);

        if ($validations->fails()) return response()->json($validations->errors(), 400);

        //CADASTRA
        $dados = $request->all();
        $dados['usuario_id'] = $usuarioID;
        $pedido = PedidosAjuda::create($dados);
        return response()->json($pedido, 201);
    }
}
