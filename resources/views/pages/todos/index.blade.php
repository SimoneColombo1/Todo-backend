@extends('layouts.app')

@section('content')
    <div class="index-container">
        <h1>Todo List</h1>

        <ul>
            @foreach ($todos as $todo)
                <li>
                    <span>{{ $todo->title }}</span>
                    <span>{{ $todo->description }}</span>
                    <span>{{ $todo->created_at }}</span>
                    <span>{{ $todo->updated_at }}</span>
                    <span>{{ $todo->completed ? 'Completed' : 'Not Completed' }}</span>
                    <span>{{ $todo->priority }}</span>
                    <span>{{ $todo->due_date }}</span>

                    <!-- Bottoni azione -->
                    <span>
                        <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler eliminare questo todo?')">
                                Delete
                            </button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('todos.trashed') }}">Vedi Todo eliminati</a>
    </div>

