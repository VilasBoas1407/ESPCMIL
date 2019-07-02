<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tb_usuario extends Model
{

	protected $table = 'tb_usuario';
	public $timestamps = false;
    protected $fillable = [
        'nome', 'email', 'senha', 'telefone', 'nivel_acesso',
    ];
    protected $hidden = [
        'senha',
    ];
}
