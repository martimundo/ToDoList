<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarefaRequest;
use App\Models\Task;
use DateTime;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;
use PHPUnit\Util\Test;

class Main extends Controller
{
    // ==========================================================================================================================================================
    public function index()
    {
        //buscar as tarefas que estão com a visualização OK.
        $tasks = Task::all();
        //Ordena as tarefas por ordem descrescente do mais novo registro para o mais antigo.
        $tasks = Task::where('visible', 1)->orderBy('created_at', 'desc')->get();
        //$tasks = Task::where('visible',1)->get();        

        return view('home', ['tasks' => $tasks]);
    }
    // ==========================================================================================================================================================
    public function new_task()
    {
        //aprensetar uma nova view para cdastrar uma nova tarefa
        return view('new_task_frm');
    }
    // ==========================================================================================================================================================
    public function new_task_submit(TarefaRequest $request)
    {       
        $request->validated();   
        
        //get data new task
        $novaTarefa = $request->input('txt_new_task');

        //save in database new task
        $tarefa = new Task();
        $tarefa->task = $novaTarefa;
        $tarefa->save();

        //redirect view home
        return redirect()->route('home');
    }
    // ==========================================================================================================================================================
    public function task_realizada($id)
    {
        //alterar se a tarefa ja foi realizada
        $tasks = Task::find($id);
        $tasks->done = new DateTime();
        $tasks->save();

        return redirect()->route('home');
    }
    // ==========================================================================================================================================================
    public function nao_realizada($id)
    {
        //alterar se a tarefa ja foi realizada
        $tasks = Task::find($id);
        $tasks->done = null;
        $tasks->save();
        return redirect()->route('home');
    }
    // ==========================================================================================================================================================
    public function editarTarefa($id)
    {
        //mostrar tarefa para edição
        $tarefa = Task::find($id);
        return view('editarTarefa_frm', ['tarefa' => $tarefa]);
    }
    // ==========================================================================================================================================================
    public function edit_save_tarefa(Request $request)
    {

        $id_tarefa = $request->input('id_tarefa');
        $editartarefa = $request->input('txt_edit_task');

        $tarefa = Task::find($id_tarefa);
        $tarefa->task = $editartarefa;
        $tarefa->save();
        return redirect()->route('home');
    }

    public function esconderTarefa($id)
    {
        $tasks = Task::find($id);
        $tasks->visible = 0;
        $tasks->save();
        return redirect()->route('home');

    }

    public function visualizarTarefa($id)
    {
        $tasks = Task::find($id);
        $tasks->visible = 1;
        $tasks->save();
        return redirect()->route('home');
    }

    public function tarefasInvisiveis()
    {
        //buscar as tarefas que estão com a visualização OK.
        $tasks = Task::all();

        //Ordena as tarefas por ordem descrescente do mais novo registro para o mais antigo.
        $tasks = Task::where('visible', 0)
                ->orderBy('created_at', 'desc')
                ->get();

        //$tasks = Task::where('visible',1)->get();
        return view('invisibel', ['tasks' => $tasks]);
    }

}
