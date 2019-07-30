@extends('template.main')


@section('content')
<h1>Ola Blade</h1>

<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>TASK</th>
        <th>CREATE AT</th>
        <th>VIEW</th>
        <th>EDIT</th>
        <th>DELETE</th>
    </tr>    
    @foreach ($tasks as $task)
    <tr>
        <td>{{ $task->id }}</td>
        <td>{{ $task->body }}</td>
        <td>{{ $task->created_at->toFormattedDateString() }}</td>
        <td><a class="btn btn-primary" href="/tasks/{{ $task->id }}">VIEW</a></td>
        <td><a class="btn btn-warning" href="/tasks/{{ $task->id }}/edit">EDIT</a></td>
        <td>
            <form action="{{ route('tasks.destroy', $task->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>



<img class="img-responsive" src="{{ url("/storage/imagens/033008201809275bac4ec0db35c.jpeg") }}" alt="alow">

@endsection