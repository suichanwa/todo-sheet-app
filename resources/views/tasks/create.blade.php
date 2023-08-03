<!-- resources/views/tasks/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Create New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Task Title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Task Description:</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-2">Back to Tasks</a>
@endsection
