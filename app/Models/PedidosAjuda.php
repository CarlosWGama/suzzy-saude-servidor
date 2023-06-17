<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PedidosAjuda extends Model {
    use HasFactory;

    protected $fillable = ['usuario_id', 'origem', 'visualizado'];

    public function usuario(): HasOne {
        return $this->hasOne(Usuario::class, 'id');
    }

    //Adiciona a descrição da origem
    public function getOrigemDescricaoAttribute() {
        //1 - cvv | 2 - samu | 3 - policia | 4 - hospital
        switch($this->origem) {
            case 1: return 'CVV';
            case 2: return 'SAMU';
            case 3: return 'Polícia';
            case 4: return 'Hospital';
            default: return 'Não informado';
        }
    }

    //Adiciona a data
    public function getDataAttribute() {
        return Carbon::parse($this->created_at)->format('d/m/Y H:i:s');
    }

}
