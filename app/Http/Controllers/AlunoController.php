<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function getExercicios()
    {
        $auth = session()->get('authUser');
        if($auth->nivel_acesso == 3){
            $id_aluno = $auth->id; 
            $search = \App\Tb_usuario_has_concurso::where(['tb_usuario_id' => $id_aluno])->get();
            $cadastrado = $search->first()->tb_concurso_id_concurso;
            $concurso = \App\Tb_concurso::where(['id_concurso' => $cadastrado])->first();
            return view('aluno.exercicios')->with('concurso', $concurso);
        }
    }
    public function getMaterias($nivel_acesso, $id, $idConcurso)
    {
        $auth = session()->get('authUser');
        if($auth->nivel_acesso == 3){
            $materias = \App\Tb_materia::where(['tb_concurso_id_concurso' => $idConcurso])->get();
            return view('aluno.exercicios.index')->with('materias', $materias);
        }
    }
    public function getListas($nivel_acesso, $id, $idConcurso, $idMateria)
    {
        $auth = session()->get('authUser');
        if($auth->nivel_acesso == 3){
            $exercicios = \App\Tb_questao::where(['tb_materia_id_materia' => $idMateria])->get()->take(10);
            return view('aluno.exercicios.lista')->with('exercicios', $exercicios);
        }
    }
    public function verifyQuest(Request $request, $nivel_acesso, $id, $idConcurso, $idMateria, $idQuestao)
    {
        $find = \App\Tb_questao::where('id_questoes', $idQuestao)->first();
        $resposta = $request->input('resposta');
        if($find->resposta == $resposta){
            if(session()->has($idQuestao)){
                $request->session()->forget($idQuestao);
                $request->session()->put($idQuestao, "hgjh");
            }
            $request->session()->put($idQuestao, "hgjh");
            if(session()->has('cont_certas')){
                $cont_certas = session()->get('cont_certas');
                $cont_certas = $cont_certas + 1;
            }
            else{
                $request->session()->put('cont_certas', 1);
            }
        }
        else{
            $request->session()->put($idQuestao, "Resposta Incorreta!!");
        }
        return redirect()->back();
    }
    public function respostaExerc(Request $request, $nivel_acesso, $id, $idConcurso, $idMateria, $idQuestao)
    {
        $find = \App\Tb_questao::where('id_questoes', $idQuestao)->first();
        $resposta = $request->input('resposta');
        if($find->resposta == $resposta){
            $request->session()->put('questao', $idQuestao);
            if(session()->has('cont')){
               $request->session()->forget('cont');
               $cont = 1;
                $explicacao = $find->explicacao;
                $correta = $find->resposta;
               $array = [
                   'id' => $cont,
                   'explicacao' => $explicacao,
                   'correta' => $correta,
                   ];
               $request->session()->put('cont', $array);
            }
            else{
                $cont = 1;
                $explicacao = $find->explicacao;
                $correta = $find->resposta;
               $array = [
                   'id' => $cont,
                   'explicacao' => $explicacao,
                   'correta' => $correta,
                   ];
               $request->session()->put('cont', $array);
            }
        }
        else{
            $request->session()->put('questao', $idQuestao);
            $cont = 2;
            $explicacao = $find->explicacao;
                $correta = $find->resposta;
            if(session()->has('cont')){
                $request->session()->forget('cont');
                $array = [
                   'id' => $cont,
                   'explicacao' => $explicacao,
                   'correta' => $correta,
                   ];
                $request->session()->put('cont', $array);  
            }
            else{
                $array = [
                   'id' => $cont,
                   'explicacao' => $explicacao,
                   'correta' => $correta,
                   ];
                $request->session()->put('cont', $array); 
                
            }
            
        }
        return redirect()->back();
    }
    public function finalizarExerc(Request $request)
    {
        $auth_email = session()->get('auth')->email;
        $auth_senha = session()->get('auth')->senha;
        $auth_nivel_acesso = session()->get('auth')->nivel_acesso;
        $request->session()->flush(); // removes all session data

        $auth = \App\Tb_usuario::where(['email' => $auth_email, 'senha' => $auth_senha])->first();
        if($auth == true){
            $usuario = $request->session()->put('auth', $auth); 
            if($auth->nivel_acesso == 3) {
                $sessionAuth = $request->session()->put('authUser', $auth);
            }
            return redirect()->route('home');
        }
        else{
            echo "Algo de errado";
        }

    }
}
