<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Alerta extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'data_ocorrencia'];

    public function usuario(): HasOne {
        return $this->hasOne(Usuario::class, 'id', 'usuario_id');
    }

    //Adiciona a data
    public function getDataOcorrenciaAttribute() {
        return Carbon::parse($this->created_at)->format('d/m/Y H:i:s');
    }

}
