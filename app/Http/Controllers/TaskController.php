<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{


    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    // Show the create task form
    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:to do,in process,done',
        ]);

        // Get the authenticated user's ID
        $user_id = Auth::id();

        // Create the new task with user_id
        $task = new Task([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'user_id' => $user_id, // Assign the user_id to the task
        ]);

        // Save the task to the database
        $task->save();

        // Redirect to the tasks.index route or do whatever you need here
        return redirect()->route('tasks.index');
    }

    // Show a specific task
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Show the edit task form
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Update a specific task
    public function update(Request $request, Task $task)
    {
        // Validation and update logic
        // Example:
        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);

        return redirect('/tasks');
    }

    // Delete a specific task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }
}
