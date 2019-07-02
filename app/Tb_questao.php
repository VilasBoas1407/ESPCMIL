<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tb_questao extends Model
{
    protected $table = 'tb_questoes';
    protected $primaryKey = 'id_questoes';
    public $timestamps = false;
    protected $fillable = [
        'enunciado', 'alternativa_a', 'alternativa_b', 'alternativa_c', 'alternativa_d', 'resposta', 'explicacao', 'tb_materia_id_materia',
    ];
}
