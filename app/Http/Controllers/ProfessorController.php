<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function getAdicionar($nivel_acesso, $id, $idMateria)
    {
        $auth = session()->get('authProf');
        if($auth->nivel_acesso == 2){
            return view('professor.questoes.adicionar');
        }
        else{
            echo 'vc não tem permissão';
        }
    }
    public function postAdicionar(Request $request, $nivel_acesso, $id, $idMateria)
    {
        $auth = session()->get('authProf');
        if($auth->nivel_acesso == 2){
            $enunciado = $request->input('enunciado');
            $altA = $request->input('altA');
            $altB = $request->input('altB');
            $altC = $request->input('altC');
            $altD = $request->input('altD');
            $resposta = $request->input('resposta');
            $explic = $request->input('explicacao');
            if($resposta == "A"){
                $resposta = "alternativa_a";
            }
            if($resposta == "B"){
                $resposta = "alternativa_b";    
            }
            if($resposta == "C"){
                $resposta = "alternativa_c";
            }
            if($resposta == "D"){
                $resposta = "alternativa_d";
            }
            $dados = [
                'enunciado' => $enunciado,
                'alternativa_a' => $altA,
                'alternativa_b' => $altB,
                'alternativa_c' => $altC,
                'alternativa_d' => $altD,
                'resposta' => $resposta,
                'explicacao' => $explic,
                'tb_materia_id_materia' => $idMateria,
            ];
            $insert = \App\Tb_questao::create($dados);
            return redirect()->back();
        }
        else{
            echo 'vc não tem permissão';
        }
    }
    public function getListar($nivel_acesso, $id, $idMateria)
    {
        $auth = session()->get('authProf');
        if($auth->nivel_acesso == 2){
            $exercicios = \App\Tb_questao::where(['tb_materia_id_materia' => $idMateria])->get();
            return view('professor.questoes.listar')->with('exercicios', $exercicios);
        }
        else{
            echo 'vc não tem permissão';
        }
    }
    public function postExcluirQuest(Request $request, $nivel_acesso, $id, $idQuestao)
    {
        $auth = session()->get('authProf');
        if($auth->nivel_acesso == 2){
            $questao = \App\Tb_questao::find($idQuestao);
            $questao->delete();
            return redirect()->back();
        }
        else{
            echo 'vc não tem permissão';
        }
    }
}
