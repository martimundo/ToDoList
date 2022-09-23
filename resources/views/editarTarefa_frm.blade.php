@extends('layouts.main_layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>TODO LIST</h3>
                <hr>
                <h4 class="text-center mb-5">Editar Tarefa</h4>

                <form action="{{ route('edit_save_tarefa') }}" method="post">
                    @csrf

                    <input type="hidden" name="id_tarefa" value={{ $tarefa->id }}>


                    <div class="row">
                        <div class="col-sm-4 offset-sm-4">
                            <div class="form-group">
                                <label for="txt_edit_task">Nova Tarefa:</label>
                                <input type="text" name="txt_edit_task" id="txt_edit_task" class="form-control sm"
                                    value="{{ $tarefa->task }}">
                            </div>
                            <div class="form-group">
                                <a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
                                <input type="submit" value="Salvar" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
