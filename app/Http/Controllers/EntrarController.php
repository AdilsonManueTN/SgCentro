<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EntrarController extends Controller
{
    //

    private function userExiste($email)
    {
        $dados = User::where('email', $email)->select('email')->get();
        return $dados;
    }

    public function entrarSistema(Request $request)
    {
        //$entrarSistema['success'] = false;
        $dados="";

        if(!(filter_var(($request->email), FILTER_VALIDATE_EMAIL)) ){
             $entrarSistema['success']=false;
             $entrarSistema['message']='Email  inválido';
             return json_encode($entrarSistema);
             
        }

        if( strlen($request->password)<3 ){
            $entrarSistema['success']=false;
            $entrarSistema['message']='A Senha deve ter no mínimio 8 caracteres';
            return json_encode($entrarSistema);
            
        }
        //dd($request->email);
        $dados=$this->userExiste($request->email);
        //dd($dados);
        if( $dados->isEmpty() ){

            $entrarSistema['success'] = false;
            $entrarSistema['message'] = 'credencias desconhecidas';
            return json_encode($entrarSistema);
            
        }


        foreach($dados as $dado){
            $dados=$dado->email;
        }
        $credencials=['email'=>$dados,
        'password'=>$request->password];
        if(Auth::attempt($credencials))
        {
            $entrarSistema['success'] = true;
            return json_encode($entrarSistema);
            //
        }


        $entrarSistema['success'] = false;
        $entrarSistema['message'] = 'credencias desconhecidas';
        return json_encode($entrarSistema);
        //dd("credencias desconhecidas");
    }


    public function index()
    {
        return view('admin.index.index');
    }


}
