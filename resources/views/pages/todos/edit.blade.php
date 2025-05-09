@extends('layouts.app')

@section('content')
    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input
                type="text"
                name="title"
                id="title"
                class="form-control"
                value="{{ old('title', $todo->title) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea
                name="description"
                id="description"
                class="form-control"
                required
            >{{ old('description', $todo->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="completed">Completed</label><br>
            <input type="hidden" name="completed" value="0">
            <input
                type="checkbox"
                name="completed"
                id="completed"
                value="1"
                {{ old('completed', $todo->completed) ? 'checked' : '' }}
            >
        </div>

        <div class="form-group">
            <label for="priority">Priority</label>
            <select name="priority" id="priority" class="form-control">
                <option value="low" {{ old('priority', $todo->priority) === 'low' ? 'selected' : '' }}>Low</option>
                <option value="medium" {{ old('priority', $todo->priority) === 'medium' ? 'selected' : '' }}>Medium</option>
                <option value="high" {{ old('priority', $todo->priority) === 'high' ? 'selected' : '' }}>High</option>
            </select>
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input
                type="date"
                name="due_date"
                id="due_date"
                class="form-control"
                value="{{ old('due_date', \Illuminate\Support\Str::limit($todo->due_date, 10, '')) }}"
            >
        </div>

        <button type="submit" class="btn btn-primary">Update Todo</button>
    </form>




