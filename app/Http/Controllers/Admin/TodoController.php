<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index()
    {
        $todos = Todo::where('user_id', auth()->id())->get();
        return view('pages.todos.index', compact('todos'));
    }



    public function create()
    {
        $todos= new Todo();

        return view('pages.todos.create', compact('todos'));
    }


    public function store(Request $request)
    {
        $newTodo = new Todo();
        $newTodo->title = $request->input('title');
        $newTodo->description = $request->input('description');
        $newTodo->completed = $request->input('completed');
        $newTodo->priority = $request->input('priority');
        $newTodo->due_date = $request->input('due_date');
        $newTodo->user_id = auth()->id();  // Associa l'utente autenticato al todo
        $newTodo->save();

        return redirect()->route('todos.index');
    }


    public function show(string $id)
    {
        $todo = Todo::where('user_id', auth()->id())->findOrFail($id);
        return view('pages.todos.show', compact('todo'));
    }


    public function edit(Todo $todo)
    {
        $this->authorizeOwner($todo);
        return view('pages.todos.edit', compact('todo'));
    }



    public function update(Request $request, Todo $todo)
    {
        $this->authorizeOwner($todo);
        $todo->fill($request->only(['title', 'description', 'completed', 'priority', 'due_date']));
        $todo->save();

        return redirect()->route('todos.show', $todo);
    }




    public function destroy(Todo $todo)
    {
        $this->authorizeOwner($todo);
        $todo->delete();

        return redirect()->route('todos.index');
    }




    public function trashed()
    {
        $todos = Todo::onlyTrashed()->where('user_id', auth()->id())->get();
        return view('pages.todos.trashed', compact('todos'));
    }


    public function restore($id)
    {
        $todo = Todo::onlyTrashed()->where('user_id', auth()->id())->findOrFail($id);
        $todo->restore();

        return redirect()->route('todos.index')->with('success', 'Todo ripristinato con successo!');
    }

    public function forceDestroy($id)
    {
        $todo = Todo::onlyTrashed()->where('user_id', auth()->id())->findOrFail($id);
        $todo->forceDelete();

        return redirect()->route('todos.trashed')->with('success', 'Todo eliminato definitivamente!');
    }
}
