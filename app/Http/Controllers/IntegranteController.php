<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Integrante;

class IntegranteController extends Controller
{
    public function add(Request $request){
        try{
            $integrante = new Integrante;

            $integrante->nome = $request->nome;
        
            $integrante->save();

            return ['status' => 'salvo'];
        }
        catch(\Exception $erro){
            return ['status' => 'erro', 'detalhes' ->$erro];
        }
    }

    public function list(){
        $integrante = new Integrante;
        
        return $integrante->all();
    }

    public function select($id){
        $integrante = new Integrante;
        
        return $integrante->find($id);
    }

    public function update(Request $request, $id){
        try{
            $integrante = new Integrante;
            $integrante = $integrante->find($id);

            $integrante->nome = $request->nome;
        
            $integrante->save();

            return ['status' => 'atualizado'];
        }
        catch(\Exception $erro){
            return ['status' => 'erro', 'detalhes' ->$erro];
        }
    }

    public function delete($id){
        try{
            $integrante = new Integrante;
            $integrante = $integrante->find($id);
        
            $integrante->delete();

            return ['status' => 'excluído'];
        }
        catch(\Exception $erro){
            return ['status' => 'erro', 'detalhes' ->$erro];
        }
    }
}
