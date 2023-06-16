<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PedidosAjuda extends Model {
    use HasFactory;

    protected $fillable = ['usuario_id', 'origem', 'visualizado'];

    public function usuario(): HasOne {
        return $this->hasOne(UsuariosExtras::class, 'usuario_id');
    }

}
