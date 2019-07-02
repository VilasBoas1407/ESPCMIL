<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function painel($nivel_acesso, $id)
    {
    	$auth = session()->get('authAdmin');
    	if($auth->nivel_acesso == 1){
    		return view('admin.painel');
    	}
    }
    public function getAddProfessor($nivel_acesso, $id)
    {
    	$auth = session()->get('authAdmin');
    	if($auth->nivel_acesso == 1){
    		$materia = \App\Tb_materia::all();
    		return view('admin.professor.add')->with('materia', $materia);
    	}
    }
    public function postAddProfessor(Request $request, $nivel_acesso, $id)
    {
    	$auth = session()->get('authAdmin');
    	if($auth->nivel_acesso == 1){
    		$nome = $request->input('nome');
    		$telefone = $request->input('telefone');
    		$email = $request->input('email');
    		$senha = $request->input('senha');
    		$idMateria = $request->input('materia');

    		$dados = [
    		'nome' => $nome,
    		'telefone' => $telefone,
    		'senha' => md5($senha),
    		'email' => $email,
    		'tb_materia_id_materia' => $idMateria,
    		'nivel_acesso' => 2,
    		];

    		$insert = $this->insertProf($dados);
    		return redirect()->back();
    	}
    }
    public function getAddConcurso($nivel_acesso, $id)
    {
    	$auth = session()->get('authAdmin');
    	if($auth->nivel_acesso == 1){
    		return view('admin.concurso.add');
    	}
    }
    public function postAddConcurso(Request $request, $nivel_acesso, $id)
    {
    	$auth = session()->get('authAdmin');
    	if($auth->nivel_acesso == 1){
    		$desc = $request->input('desc');

    		$dados = [
    		'desc_concurso' => $desc,
    		];

    		$insert = $this->insertConcurso($dados);
    		return redirect()->back();
    	}
    }
    public function getAddMateria($nivel_acesso, $id)
    {
    	$auth = session()->get('authAdmin');
    	if($auth->nivel_acesso == 1){
    		$concurso = \App\Tb_concurso::all();
    		return view('admin.materia.add')->with('concurso', $concurso);
    	}
    }
    public function postAddMateria(Request $request, $nivel_acesso, $id)
    {
    	$auth = session()->get('authAdmin');
    	if($auth->nivel_acesso == 1){
    		$desc = $request->input('desc');
    		$concurso = $request->input('concurso');

    		$dados = [
    		'desc_materia' => $desc,
    		'tb_concurso_id_concurso' => $concurso,
    		];

    		$insert = $this->insertMateria($dados);
    		return redirect()->back();
    	}
    }
    public function getAddAluno($nivel_acesso, $id)
    {
    	$auth = session()->get('authAdmin');
    	if($auth->nivel_acesso == 1){
    		$concurso = \App\Tb_concurso::all();
    		return view('admin.aluno.add')->with('concurso', $concurso);
    	}
    }
    public function postAddAluno(Request $request, $nivel_acesso, $id)
    {
    	$auth = session()->get('authAdmin');
    	if($auth->nivel_acesso == 1){
    		$nome = $request->input('nome');
    		$telefone = $request->input('telefone');
    		$email = $request->input('email');
    		$senha = $request->input('senha');
    		$concurso = $request->input('concurso');

    		$dados = [
    		'nome' => $nome,
    		'telefone' => $telefone,
    		'senha' => md5($senha),
    		'email' => $email,
    		'nivel_acesso' => 3,
    		];
    		$insert = $this->insertAluno($dados);

    		$aluno = $this->findAluno($email);
    		$dadosConcurso = [
    		'tb_usuario_id' => $aluno->id,
    		'tb_concurso_id_concurso' => $concurso,
    		];
    		$insertConcurso = $this->insertAlunoConcurso($dadosConcurso);

    		return redirect()->back();
    	}
    }
    protected function insertProf($data)
    {
    	try {
    		$query = \App\Tb_professor::create($data);
    		return true;
    	} catch (Exception $e) {
    		echo "Algo errado ocorreu!";    		
    	}
    }
    protected function insertAluno($data)
    {
    	try {
    		$query = \App\Tb_usuario::create($data);
    		return true;
    	} catch (Exception $e) {
    		echo "Algo errado ocorreu!";    		
    	}
    }
    protected function insertAlunoConcurso($data)
    {
    	try {
    		$query = \App\Tb_usuario_has_concurso::create($data);
    		return true;
    	} catch (Exception $e) {
    		echo "Algo errado ocorreu!";    		
    	}
    }
    protected function insertConcurso($data)
    {
    	try {
    		$query = \App\Tb_concurso::create($data);
    		return true;
    	} catch (Exception $e) {
    		echo "Algo errado ocorreu!";    		
    	}
    }
    protected function insertMateria($data)
    {
    	try {
    		$query = \App\Tb_materia::create($data);
    		return true;
    	} catch (Exception $e) {
    		echo "Algo errado ocorreu!";    		
    	}
    }
    protected function findAluno($email)
    {
    	try {
    		$query = \App\Tb_usuario::where(['email' => $email, 'nivel_acesso' => 3])->first();
    		return $query;
    	} catch (Exception $e) {
    		
    	}
    }
}
