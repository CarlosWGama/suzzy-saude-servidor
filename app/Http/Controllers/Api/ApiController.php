<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ApiController extends Controller {
    //
    /**
     * Recupera o ID do usuário no JWT
     * @param $request | requisição enviada
     * @return int | id do usuário no JWT
     */
    protected function getUsuarioID(Request $request):int {
        $dados = JWT::decode($request->bearerToken(), new Key(config('jwt.senha'), 'HS256'));
        return $dados->id;
    }
}
