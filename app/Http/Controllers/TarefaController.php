<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function list($dInicio, $dFinal){
        //$tarefa = new Tarefa;
        //return $tarefa->all();

        $dInicio = str_replace("-", "/", $dInicio);
        $dFinal = str_replace("-", "/", $dFinal);
        
        $dados = DB::table('tarefas')
            ->join('integrantes', 'tarefas.fkIntegrante', '=', 'integrantes.id')
            ->join('datas', 'tarefas.fkData', '=', 'datas.id')
            ->join('status', 'tarefas.fkStatus', '=', 'status.id')
            ->select('integrantes.*', 'datas.*', 'status.*','tarefas.*')
            ->whereBetween('datas.dia', [$dInicio, $dFinal])
            ->orderBy('datas.dia', 'asc')
            ->orderBy('datas.hrInicial', 'asc')
            ->get();
        
        return $dados;                
    }

    public function filter($param){
        
        $dados = DB::table('tarefas')
            ->join('integrantes', 'tarefas.fkIntegrante', '=', 'integrantes.id')
            ->join('datas', 'tarefas.fkData', '=', 'datas.id')
            ->join('status', 'tarefas.fkStatus', '=', 'status.id')
            ->select('integrantes.*', 'datas.*', 'status.*','tarefas.*')
            ->where('tarefas.atividade', 'LIKE', '%'.$param.'%')
            ->orWhere('tarefas.observacao', 'LIKE', '%'.$param.'%')
            ->orWhere('integrantes.nome', 'LIKE', '%'.$param.'%')
            ->orWhere('status.andamento', 'LIKE', '%'.$param.'%')
            ->orWhere('datas.dia', 'LIKE', '%'.$param.'%')
            ->orWhere('datas.hrInicial', 'LIKE', '%'.$param.'%')
            ->orWhere('datas.hrFinal', 'LIKE', '%'.$param.'%')
            ->orderBy('datas.dia', 'asc')
            ->orderBy('datas.hrInicial', 'asc')
            ->get();
        
        return $dados;               
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
