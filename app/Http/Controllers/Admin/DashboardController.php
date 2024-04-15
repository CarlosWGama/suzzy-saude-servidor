<?php

namespace App\Http\Controllers\Admin;

use App\Models\Alerta;
use App\Models\PedidosAjuda;
use Illuminate\Http\Request;
use App\Models\Usuario;


/**
 * Tela Inicial do Admin
 */
class DashboardController extends AdminController {

    public function __construct() {
        $this->dados['menu'] = 'dashboard';
    }

    /** Tela Inicial do Dashboard */
    public function index() {
        $this->dados['usuarios'] = Usuario::count();
        $this->dados['ajudaNaoAtendidos'] = PedidosAjuda::where('visualizado', 'false')->count();
        $this->dados['alertas'] = Alerta::where('visualizado', 'false')->count();
        $this->dados['ajudaTotal'] = PedidosAjuda::count();
        return view('admin.dashboard.index', $this->dados);
    }
}
