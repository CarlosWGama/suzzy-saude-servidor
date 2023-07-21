<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contato extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome', 'telefone', 'usuario_id', 'relacionamento'];

    //Adiciona a descrição do relacionamento
    public function getRelacionamentoDescricaoAttribute() {
        switch($this->relacionamento) {
            case 1: return 'Pai';
            case 2: return 'Mãe';
            case 3: return 'Irmã(o)';
            case 4: return 'Amigo(a)';
            case 5: return 'Parente';
            case 6: return 'Outro';
            default: return 'Não informado';
        }
    }
}
