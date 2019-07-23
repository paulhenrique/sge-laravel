@extends('template.main')

@section('content')

<h1>Criar nova task</h1>

<form method="POST" action="/tasks" enctype="multipart/form-data">
    
    {{ csrf_field() }}
    
   @include('layouts.errors')
    
    <div class="form-group">
        <label for="body">Tarefa</label>
        <textarea id="body" name="body" class="form-control"></textarea>
    </div>
   
    <input type="file" name="image">
    
    <button type="submit" class="btn btn-primary">Enviar</button>
    
</form>

@endsection