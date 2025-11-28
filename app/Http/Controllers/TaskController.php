<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pending'
        ]);

        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        Task::find($id)->delete();
        return back();
    }
}
