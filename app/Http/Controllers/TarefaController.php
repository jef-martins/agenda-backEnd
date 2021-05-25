<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Tarefa;

class TarefaController extends Controller
{
    public function add(Request $request){
        try{
            $tarefa = new Tarefa;

            $tarefa->atividade = $request->atividade;
            $tarefa->observacao = $request->observacao;
            $tarefa->fkIntegrante = $request->fkIntegrante;
            $tarefa->fkData = $request->fkData;
            $tarefa->fkStatus = $request->fkStatus;
        
            $tarefa->save();

            return ['status' => 'salvo'];
        }
        catch(\Exception $erro){
            return ['status' => 'erro', 'detalhes' ->$erro];
        }
    }

    public function list(){
        $tarefa = new Tarefa;
        
        return $tarefa->all();
    }

    public function select($id){
        $tarefa = new Tarefa;
        
        return $tarefa->find($id);
    }

    public function update(Request $request, $id){
        try{
            $tarefa = new Tarefa;
            $tarefa = $tarefa->find($id);

            $tarefa->atividade = $request->atividade;
            $tarefa->observacao = $request->observacao;
            $tarefa->fkIntegrante = $request->fkIntegrante;
            $tarefa->fkData = $request->fkData;
            $tarefa->fkStatus = $request->fkStatus;
        
            $tarefa->save();

            return ['status' => 'atualizado'];
        }
        catch(\Exception $erro){
            return ['status' => 'erro', 'detalhes' ->$erro];
        }
    }

    public function delete($id){
        try{
            $tarefa = new Tarefa;
            $tarefa = $tarefa->find($id);
        
            $tarefa->delete();

            return ['status' => 'excluído'];
        }
        catch(\Exception $erro){
            return ['status' => 'erro', 'detalhes' ->$erro];
        }
    }
}
