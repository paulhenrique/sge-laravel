@extends('template.main')


@section('content')
<p>
    <a href="/tasks/{{ $task->id }}" >{{ $task->body }}</a> 
    <span>(Criado em {{ $task->created_at->toFormattedDateString() }} por {{ $task->user->name }})</span>
</p>
@endsection