@extends('template.main')

@section('content')

<h1>Editar Task</h1>

<form method="POST" action="/tasks/{{ $task->id }}">

    @csrf
    @method('PUT')

    @include('layouts.errors')

    <div class="form-group">
        <label for="body">Tarefa</label>
        <textarea id="body" name="body" class="form-control">{{ $task->body }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>

</form>

@endsection