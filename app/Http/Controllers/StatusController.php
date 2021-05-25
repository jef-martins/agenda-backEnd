<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Status;

class StatusController extends Controller
{
    public function add(Request $request){
        try{
            $status = new Status;

            $status->andamento = $request->andamento;
        
            $status->save();

            return ['status' => 'salvo'];
        }
        catch(\Exception $erro){
            return ['status' => 'erro', 'detalhes' ->$erro];
        }
    }

    public function list(){
        $status = new Status;
        
        return $status->all();
    }

    public function select($id){
        $status = new Status;
        
        return $status->find($id);
    }

    public function update(Request $request, $id){
        try{
            $status = new Status;
            $status = $status->find($id);

            $status->andamento = $request->andamento;
        
            $status->save();

            return ['status' => 'atualizado'];
        }
        catch(\Exception $erro){
            return ['status' => 'erro', 'detalhes' ->$erro];
        }
    }

    public function delete($id){
        try{
            $status = new Status;
            $status = $status->find($id);
        
            $status->delete();

            return ['status' => 'excluído'];
        }
        catch(\Exception $erro){
            return ['status' => 'erro', 'detalhes' ->$erro];
        }
    }
}
