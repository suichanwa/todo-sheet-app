<!-- resources/views/tasks/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Task Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Task Description:</label>
            <textarea name="description" id="description" class="form-control" required>{{ $task->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Task Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="to do" @if ($task->status === 'to do') selected @endif>To Do</option>
                <option value="in process" @if ($task->status === 'in process') selected @endif>In Process</option>
                <option value="done" @if ($task->status === 'done') selected @endif>Done</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-2">Back to Tasks</a>
@endsection
