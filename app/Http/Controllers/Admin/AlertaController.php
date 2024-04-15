<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Alerta;
use Illuminate\Http\Request;

class AlertaController extends AdminController {
    
     //
        
     public function __construct() {
        $this->dados['menu'] = 'alertas';
    }

    /** Lista o usuários */
    public function listar(Request $request) {

        $this->dados['filtro'] = $request->visualizado ?? -1;
        
        $alertas = Alerta::with('usuario')->orderBy('id', 'desc');
        // print_r( $alertas);die;
        if (isset($request->visualizado) && $request->visualizado >= 0)
            $alertas = $alertas->where('visualizado', $request->visualizado);
        $this->dados['alertas'] = $alertas->simplePaginate(10)->withQueryString();

        return view('admin.alertas.listar', $this->dados);
    }

    /** Diz se um alerta foi visualizado ou não
     * @param $id id do alerta
     */
    public function atendimento(int $alertaID, bool $visualizado) {
        $alerta  = Alerta::findOrFail($alertaID);
        $alerta->visualizado = $visualizado;
        $alerta->save();
        return redirect()->route('admin.alertas.listar')->with('sucesso', 'Alerta de ajuda atualizado');
    }

    /** Remove um alerta
     * @param $id id do alerta
     */
    public function excluir(int $id) {
        Alerta::destroy($id);
        return redirect()->route('admin.alertas.listar')->with('sucesso', 'Alerta de ajuda excluído');
    }


    
}
