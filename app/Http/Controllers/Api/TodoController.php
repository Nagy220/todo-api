<?php

namespace App\Http\Controllers\Api;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::orderBy('priority')->latest()->get();
        return response()->json($todos, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=> 'required|string',
            'description' => 'nullable|string',
            'file' => 'nullable|mimes:pdf|max:2048',
            'priority' => 'nullable|in:0,1,2',
        ]);
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('todos', 'public');
        }
        $todo = Todo::create($data);
        return response()->json($todo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return response()->json($todo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $data = $request->validate([
        'title' => 'required|string',
        'description' => 'nullable|string',
        'file' => 'nullable|mimes:pdf|max:2048',
        'priority' => 'nullable|in:0,1,2',
        ]);

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('todos', 'public');
        }

        $todo->update($data);

        return response()->json($todo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        if ($todo->file_path) {
            Storage::disk('public')->delete($todo->file_path);
        }

        $todo->delete();

        return response()->json(['message' => 'Todo deleted']);
    }
}
