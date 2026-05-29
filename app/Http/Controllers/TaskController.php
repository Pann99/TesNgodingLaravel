<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        // Search
        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $tasks = $query->latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required',
            'task_date' => 'required',
            'status' => 'required'
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Task berhasil ditambahkan');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required',
            'task_date' => 'required',
            'status' => 'required'
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Task berhasil diupdate');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task berhasil dihapus');
    }
}