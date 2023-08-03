<!-- resources/views/tasks/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>To-Do Tasks</h1>

    <ul class="list-group">
        @foreach ($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $task->title }}
                <div>
                    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('tasks.create') }}" class="btn btn-success mt-3">Add New Task</a>
@endsection
