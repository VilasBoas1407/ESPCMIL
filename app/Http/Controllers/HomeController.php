<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	return view('index');
    }
    public function loginProf()
    {
    	return view('login.authProf');
    }
    public function postloginProf(Request $request){
    	$email = $request->input('email');
    	$senha = $request->input('senha');
    	$auth = \App\Tb_professor::where(['email' => $email, 'senha' => md5($senha)])->first();
    	if($auth == true){
    		$usuario = $request->session()->put('auth', $auth);
    		if($auth->nivel_acesso == 2){
    			$sessionAuth = $request->session()->put('authProf', $auth);
    		}
    		return redirect()->route('home');
    	}
    	else{
    		echo 'email e senha não conferem';
    	}
    }
    public function loginUser()
    {
    	return view('login.authUser');
    }
    public function postloginUser(Request $request){
    	$email = $request->input('email');
    	$senha = $request->input('senha');
    	$auth = \App\Tb_usuario::where(['email' => $email, 'senha' => md5($senha)])->first();
    	if($auth == true){
    		$usuario = $request->session()->put('auth', $auth);
    		if($auth->nivel_acesso == 1){
    			$sessionAuth = $request->session()->put('authAdmin', $auth);
    		} 
    		elseif($auth->nivel_acesso == 3) {
    			$sessionAuth = $request->session()->put('authUser', $auth);
    		}
    		return redirect()->route('home');
    	}
    	else{
    		echo 'email e senha não conferem';
    	}
    }
    public function logout(Request $request){
    	$auth = $request->session()->get('auth');
    	$nivel = $auth->nivel_acesso;
    	if($nivel == 1){
    		$request->session()->forget('authAdmin');	
    	}
    	elseif($nivel == 2){
    		$request->session()->forget('authProf');	
    	}
    	elseif($nivel == 3){
    		$request->session()->forget('authUser');	
    	}
    	$request->session()->forget('auth');
    	return redirect()->route('home');
    }
   
}
