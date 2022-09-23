@extends('layouts.main_layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>TODO LIST</h3>
                <hr>
                <div class="my-2">
                    
                    <a href="#" class="btn btn-danger"><i class="fa fa-eye-slash" aria-hidden="true">Tarefas Escondidas</i></a>
                    <a href="{{route('home')}}" class="btn btn-success"><i class="fa fa-reply" aria-hidden="true">Voltar</i></a>
                </div>
                
                <hr>
                {{-- aqui a logica para apresentar apenas as tarefas que existem no banco de dados --}}
                @if ($tasks->count() === 0)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Sem tarefas para serem Visualizadas!</strong>
                    </div>
                    <script>
                        $(".alert").alert();
                    </script>
                @else
                    <table class="table table-striped table-inverse">
                        <thead class="thead-dark">
                            <tr>
                                <th>Tarefa</th>
                                <th>Tarefa</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- aqui esta percorrendo a lista de taredas que foi carregada no Controller Main da aplicação --}}
                            @foreach ($tasks as $task)
                                <tr>
                                    <td scope="row"><span>ID: {{ $task->id }}</span></td>
                                    <td scope="row">{{ $task->task }}</td>
                                    <td scope="row">
                                        {{-- realizada ou não --}}
                                        @if ($task->done == null)
                                            <a href="{{ route('task_realizada', ['id' => $task->id]) }}"
                                                class="btn btn-warning btn-sm"><i class="fa fa-check-square-o"
                                                    aria-hidden="false">A Fazer</i></a>
                                        @else
                                            <a
                                                href="{{ route('nao_realizada', ['id' => $task->id]) }}"class="btn btn-succes btn-sm"><i
                                                    class="fa fa-times-circle" aria-hidden="true">Realizada</i></a>
                                        @endif

                                        {{-- Editar --}}
                                        <a href="{{ route('editarTarefa', ['id' => $task->id]) }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true">Editar</i></a>

                                        {{-- Visualizar --}}
                                        @if ($task->visible === 0)
                                            <a href="{{ route('visualizarTarefa', ['id' => $task->id]) }}"
                                                class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                    aria-hidden="true">Visualizar Tarefa</i></a>                                       
                                        @endif
                                        {{-- -Deletar --}}
                                        <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"
                                                aria-hidden="true">Excluir</i></a>

                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <p>Total de Tarefas ativas: <strong>{{ $tasks->count() }}</strong></p>
                @endif
            </div>
        </div>
    </div>
@endsection
