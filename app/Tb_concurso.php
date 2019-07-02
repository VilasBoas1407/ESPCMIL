<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tb_concurso extends Model
{
    protected $table = 'tb_concurso';
    public $timestamps = false;
    protected $fillable = [
        'desc_concurso',
    ];
}
