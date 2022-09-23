@extends('layouts.main_layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>TODO LIST</h3>
                <hr>
                <h4 class="text-center mb-5">Cadastrar nova tarefa!</h4>

                <form action="{{ route('new_task_submit') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4 offset-sm-4">
                            <div class="form-group">
                                <label for="txt_new_task">Nova Tarefa:</label>
                                <input type="text" name="txt_new_task" id="txt_new_task" class="form-control sm" value="{{old('txt_new_task')}}">
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
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
@endsection
