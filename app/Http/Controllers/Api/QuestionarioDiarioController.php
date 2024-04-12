<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alerta;
use App\Models\Planta;
use App\Models\QuestionarioDiario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Question\Question;

class QuestionarioDiarioController extends ApiController {
    //

    //Realiza o cadastro do questionario do dia
    public function cadastrar(Request $request) {
        $usuarioID = $this->getUsuarioID($request);
        
        //VALIDA
        $validations = Validator::make($request->all(), [
            'tristeza'          => 'required|integer',
            'choro'             => 'required|integer',
            'medo'              => 'required|integer',
            'desconcentracao'   => 'required|integer',
            'nauseas'           => 'required|integer',
            'insonia'           => 'required|integer',
            'higiene'           => 'required|integer',
            'isolamento'        => 'required|integer'
        ]);

        if ($validations->fails()) return response()->json($validations->errors(), 400);

        //CADASTRA
        $dados = $request->all();
        $dados['usuario_id'] = $usuarioID;
        $dados['dia'] = date('Y-m-d');
        $questionario = QuestionarioDiario::where('usuario_id', $usuarioID)->where('dia', date('Y-m-d'))->firstOrNew();
        $questionario->fill($dados);
        $questionario->save();


        //PLANTA
        $planta = Planta::where('usuario_id', $usuarioID)->firstOrNew();
        if ($planta->ultima_regada != date('Y-m-d')) {
            $planta->usuario_id = $usuarioID;
            $planta->dias_totais_aguados++;
            if (!$planta->ultima_regada) {
                $planta->dias_seguidos++;
            } else {
                $data_inicio = new \DateTime($planta->ultima_regada);
                $data_fim = new \DateTime(date('Y-m-d'));
    
                // Resgata diferença entre as datas
                $dateInterval = $data_inicio->diff($data_fim);
                if ($dateInterval->days > 1) $planta->dias_seguidos++;
                else $planta->dias_seguidos = 1;
            }
            $planta->ultima_regada = date('Y-m-d');
            $planta->save();
        }

        //ALERTA
        $triste = 0;
        unset($dados['usuario_id']);    
        unset($dados['dia']);    
        foreach ($dados as $valor) {
            if ($valor == 1) $triste++;
        }

        if ($triste > 0) {
            Alerta::create([
                'usuario_id'        => $usuarioID,
                'data_ocorrencia'   => date('Y-m-d')
            ]);
        }

        return response()->json(['planta' => $planta], 201);
    }

    /**
     * Busca os dados da planta do usuário e questionário do dia
     */
    public function buscar(Request $request) {
        $usuarioID = $this->getUsuarioID($request);
        $questionario = QuestionarioDiario::where('dia', date('Y-m-d'))->where('usuario_id', $usuarioID)->firstOrFail();

        $planta = Planta::where('usuario_id', $usuarioID)->first();

        return response()->json(['sintomas' => $questionario, 'planta' => $planta], 200);
    }
}
