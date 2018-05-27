@extends('layout')
 
@section('content')
            <h1>Showing Task {{ $task->title }}</h1>
   <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('tasks.index') }}"> Back</a>
    </div>
    <div class="jumbotron text-center">
        <p>
            <strong>Task Title:</strong> {{ $task->title }}<br>
            <strong>Description:</strong> {{ $task->description }}
        </p>
    </div>
@endsection