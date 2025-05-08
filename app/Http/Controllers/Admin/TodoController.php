<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $todos= Todo::all();
     return view('pages.todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $todos= new Todo();

        return view('pages.todos.create', compact('todos'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('pages.todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
