<?php

namespace App\Http\Controllers\Admin;

use App\Models\PedidosAjuda;
use Illuminate\Http\Request;

class PedidosAjudaController extends AdminController {
    //
        
    public function __construct() {
        $this->dados['menu'] = 'pedidos';
    }

    /** Lista o usuários */
    public function listar(Request $request) {

        $this->dados['filtro'] = $request->visualizado ?? -1;
        
        $pedidos = PedidosAjuda::with('usuario')->orderBy('id', 'desc');
        // print_r( $pedidos);die;
        if (isset($request->visualizado) && $request->visualizado >= 0)
            $pedidos = $pedidos->where('visualizado', $request->visualizado);
        $this->dados['pedidos'] = $pedidos->simplePaginate(10)->withQueryString();

        
        
        return view('admin.pedidos.listar', $this->dados);
    }

    /** Diz se um pedido de socorro foi atendido ou não
     * @param $id id do usuário
     */
    public function atendimento(int $pedidoID, bool $visualizado) {
        $pedido  = PedidosAjuda::findOrFail($pedidoID);
        $pedido->visualizado = $visualizado;
        $pedido->save();
        return redirect()->route('admin.pedidos.listar')->with('sucesso', 'Pedido de ajuda atualizado');
    }

    /** Remove um usuário
     * @param $id id do usuário
     */
    public function excluir(int $id) {
        PedidosAjuda::destroy($id);
        return redirect()->route('admin.pedidos.listar')->with('sucesso', 'Pedido de ajuda excluído');
    }


    

}
