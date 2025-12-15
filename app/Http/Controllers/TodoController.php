<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Storage;

class TodoController extends Controller
{
    // Show all todos
    public function index() {
        $todos = Todo::all();
        return view('welcome', compact('todos'));
    }

    // Show create form (you already have frontend, so optional)
    public function create() {
        return view('welcome');
    }

    // Store new todo
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('todos', 'public');
        }

        Todo::create([
            'title' => $request->title,
            'image' => $path,
            'status' => 'pending'
        ]);

        return redirect()->back();
    }

    // Show edit form
    public function edit(Todo $todo) {
        return view('edit', compact('todo')); 
    }

    public function update(Request $request, Todo $todo) {
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048',
        'status' => 'required|in:pending,completed'
    ]);

    $todo->title = $request->title;
    $todo->status = $request->status;

    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($todo->image) {
            Storage::disk('public')->delete($todo->image);
        }
        $todo->image = $request->file('image')->store('todos', 'public');
    }

    $todo->save();

    return redirect('/')->with('success', 'Todo updated successfully!');
}

    // Delete todo
    public function destroy(Todo $todo) {
        if ($todo->image) {
            Storage::disk('public')->delete($todo->image);
        }
        $todo->delete();
        return redirect('/');
    }
}