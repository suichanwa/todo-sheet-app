<!-- resources/views/tasks/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Create New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <!-- Rest of the form code -->
        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-2">Back to Tasks</a>
@endsection
