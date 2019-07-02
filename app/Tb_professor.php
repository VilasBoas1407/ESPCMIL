<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tb_professor extends Model
{
    protected $table = 'tb_professores';
    public $timestamps = false;
    protected $fillable = [
        'nome', 'email', 'senha', 'telefone', 'tb_materia_id_materia', 'nivel_acesso',
    ];
    protected $hidden = [
        'senha',
    ];
}
