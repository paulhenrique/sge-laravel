<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller {

    public function __construct() {
        //  $this->middleware('auth');
    }

    function index() {
        //$tasks = Task::all();
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    function show(Task $task) {
        //$task = Task::find($id); se usar com o Route Model Biding não precisa disso
        return view('tasks.show', compact('task'));
    }

    function create() {
        return view('tasks.create');
    }

    function store() {

        /* primeira maneira de fazer
          $post = new Task;
          $post->body = request('body');
          $post->completed = false;
          $post->save();
         */

        $nameFile = null;
        //https://blog.especializati.com.br/upload-de-arquivos-no-laravel-com-request/
        if (request()->hasFile('image') && request()->file('image')->isValid()) {

            $name = uniqid(date('HisYmd'));
            $extension = request()->file('image')->extension();

            $nameFile = "{$name}.{$extension}";

            $upload = request()->file('image')->storeAs('imagens', $nameFile);

            if (!$upload) {
                return redirect()->back()->withErrors('error', 'Falha ao fazer upload');
            }
        }


        $this->validate(request(), [
            'body' => 'required'
        ]);

        Task::create([
            'body' => request('body'),
            'completed' => false,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/');

        //dd(request()->all());
    }

    public function edit(Task $task) {
        return view('tasks.edit', compact('task', $task));
    }

    public function update(Task $task) {
        //Validate
        $this->validate(request(), [
            'body' => 'required'
        ]);

        $task->body = request('body');
        $task->save();
        //$request->session()->flash('message', 'Successfully modified the task!');
        return redirect('tasks');
    }

    public function destroy(Task $task) {
        $task->delete();
        //$request->session()->flash('message', 'Successfully deleted the task!');
        return redirect('tasks');
    }

}
