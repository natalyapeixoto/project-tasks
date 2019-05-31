<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tarefa;

class TarefaController extends Controller
{
    public function inicio() {
        //acessando banco de dados e fazendo query na tabela de tarega onde done for igual a false
        $tarefasPendentes = Tarefa::where('done', '=', false)->get();
        
        //passando para a view a variável tarefas pendentes, primeiro argumento é o nome que vamos acessar na view, segundo
        //é o conteúdo, ou seja, a variável definida acima. 
        return view('inicio')->with('tarefasPendentes', $tarefasPendentes);
    }

    //parametro do tipo Request, que vem do form php
    public function novaTarefa(Request $request) {
        //criando tarefa nova
        $tarefa = new Tarefa;

        //populando a tarefa, no banco de dados tem o campo description e done
        $tarefa->description = $request->input('description');
        $tarefa->done = false;

        //pegando o usuário para jogar no banco
        $tarefa->user_id = auth()->user()->id;
        //agora grava no banco
        $tarefa->save();
        
        return redirect('/');
    }

        //na rota passamos a id e agora vamos usar
    public function concluirTarefa($id) {
        $tarefa = Tarefa::find($id);
        $tarefa->done = true;
        $tarefa->save();

        return redirect('/');
    }
}
