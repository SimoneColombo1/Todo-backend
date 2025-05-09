<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index()
    {
     $todos= Todo::all();
     return view('pages.todos.index', compact('todos'));
    }


    public function create()
    {
        $todos= new Todo();

        return view('pages.todos.create', compact('todos'));
    }


    public function store()
    {

        $newTodo = new Todo();
        $newTodo->title = request('title');
        $newTodo->description = request('description');
        $newTodo->completed = request('completed');
        $newTodo->priority = request('priority');
        $newTodo->due_date = request('due_date');
        $newTodo->save();
        return redirect()->route('todos.show',  $newTodo);
    }


    public function show(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('pages.todos.show', compact('todo'));
    }

    public function edit(Todo $todo)
    {


        return view('pages.todos.edit', compact('todo'));
    }


    public function update(Request $request, Todo $todo)
    {
        $todo->fill($request->only(['title', 'description', 'completed', 'priority', 'due_date']));
        $todo->save();

        return redirect()->route('todos.show', $todo);
    }



    public function destroy(Todo $todo)
    {
$todo->delete();
        return redirect()->route('todos.index');
    }


public function trashed()
    {
        $todos = Todo::onlyTrashed()->get();
        return view('pages.todos.trashed', compact('todos'));
    }

    public function restore($id)
    {
        $todo = Todo::onlyTrashed()->findOrFail($id);
        $todo->restore();

        return redirect()->route('todos.index')->with('success', 'Todo ripristinato con successo!');
    }
    public function forceDestroy($id)
    {
      
        $todo = Todo::onlyTrashed()->findOrFail($id);


        $todo->forceDelete();

        return redirect()->route('todos.trashed')->with('success', 'Todo eliminato definitivamente!');
    }
}
