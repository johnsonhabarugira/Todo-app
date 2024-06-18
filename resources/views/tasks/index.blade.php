@extends('layouts/App')

@section('content')

<h1>WELCOME</h1>

@foreach($tasks as $task)
<div class='card @if($task->isCompleted()) card border-success @endif' style='margin-bottom: 20px;'>
        <div class='card-body'>

        <p>{{$task->description}}</p>
        @if(!$task->isCompleted())
        <form action="/tasks/{{$task->id}}" method='POST'>
                @method('PATCH')
               @csrf()
        <button type='submit' class='btn btn-dark'>Complete</button>
        @else
        <form action="/tasks/{{$task->id}}" method='POST'>
                @method('DELETE')
               @csrf()
        <button type='submit' class='btn btn-danger'>Delete</button>
        @endif
        </form>

        </div>
</div>

    

@endforeach
<a href="tasks/create" class='btn btn-primary'>Add New Task</a>
@endsection('content')
