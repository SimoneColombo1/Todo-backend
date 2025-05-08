@extends('layouts.app')

@section('content')
    <form action="{{ route('todos.store') }}" method="POST">
@method('POST')
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="completed">Completed</label>
            <input type="hidden" name="completed" value=0>
            <input type="checkbox" name="completed" id="completed" value=1>
        </div>

        <div class="form-group">
            <label for="priority">Priority</label>
            <select name="priority" id="priority" class="form-control">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create Todo</button>
    </form>
    </div>




