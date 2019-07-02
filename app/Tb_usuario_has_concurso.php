<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tb_usuario_has_concurso extends Model
{
    protected $table = 'tb_usuario_has_tb_concurso';
    public $timestamps = false;
    protected $fillable = [
        'tb_usuario_id', 'tb_concurso_id_concurso',
    ];
}
