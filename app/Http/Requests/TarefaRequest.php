<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaRequest extends FormRequest
{
   
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txt_new_task'=>['required', 'txt_new_task','max:10']
        ];
    }

    public function messages(){
        return [
            'txt_new_task.required'=>'A tarefa precisa ser preenchida'
        ];
    }
}
