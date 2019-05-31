@extends('layouts.app')

@section('content')

<div class='container'>

    <div class="panel panel-default">
        <div class='panel-heading'>
            <h3>Nova Tarefa</h3>
        </div>
        
        <div class="panel-body">
            <form action='/nova-tarefa' method="POST" class="form-horizontal">
                <!-- tem que ter tem todo form do laravel @csrf-->
                @csrf
                
                <div class="form-group">
                    <label class="form-control">Tarefa</label>
                    <input type="text" name="description" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit">+ Adicionar </button>
                </div>
                
            <form>
        </div>
    </div>

    @if (count($tarefasPendentes)> 0)
        
    <div class="panel panel-default">
    
        <div class="panel-heading">
            Tarefas Pendentes
        </div>
        
        <div class='panel-body'>
            <table class="table table-striped table-hover">
                <thead>
                    <th>Tarefa<th>
                    <th></th>
                </thead>
                    
                <tbody>
                    @foreach($tarefasPendentes as $tarefa)
                        <tr>
                            <td class="table-text">{{ $tarefa->description }}</td>
                            <td>
                                <a href="/concluir-tarefa/{{$tarefa->id}}" >Concluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>


    @endif
    
</div>

@endsection>
