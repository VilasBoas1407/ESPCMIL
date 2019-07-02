<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tb_materia extends Model
{
    protected $table = 'tb_materia';
    public $timestamps = false;
    protected $fillable = [
        'desc_materia', 'tb_concurso_id_concurso',
    ];
}
