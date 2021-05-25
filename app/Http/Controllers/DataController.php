<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Data;

class DataController extends Controller
{
    public function add(Request $request){
        try{
            $data = new Data;

            $data->dia = $request->dia;
            $data->hrInicial = $request->hrInicial;
            $data->hrFinal = $request->hrFinal;
        
            $data->save();

            return ['status' => 'salvo'];
        }
        catch(\Exception $erro){
            return ['status' => 'erro', 'detalhes' ->$erro];
        }
    }

    public function list(){
        $data = new Data;
        
        return $data->all();
    }

    public function select($id){
        $data = new Data;
        
        return $data->find($id);
    }

    public function update(Request $request, $id){
        try{
            $data = new Data;
            $data = $data->find($id);

            $data->dia = $request->dia;
            $data->hrInicial = $request->hrInicial;
            $data->hrFinal = $request->hrFinal;
        
            $data->save();

            return ['status' => 'atualizado'];
        }
        catch(\Exception $erro){
            return ['status' => 'erro', 'detalhes' ->$erro];
        }
    }

    public function delete($id){
        try{
            $data = new Data;
            $data = $data->find($id);
        
            $data->delete();

            return ['status' => 'excluído'];
        }
        catch(\Exception $erro){
            return ['status' => 'erro', 'detalhes' ->$erro];
        }
    }
}
