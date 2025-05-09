@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Todo Eliminati</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Titolo</th>
                    <th>Descrizione</th>
                    <th>Data Eliminazione</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                    <tr>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->description }}</td>
                        <td>{{ $todo->deleted_at }}</td>
                        <td>
                            <!-- Pulsante per ripristinare il todo -->
                            <form action="{{ route('todos.restore', $todo->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Ripristina</button>
                            </form>

                            <!-- Pulsante per eliminare definitivamente il todo -->
                            <form action="{{ route('todos.forceDelete', $todo->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Elimina Definitivamente</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('todos.index') }}" class="btn btn-primary">Torna alla lista</a>
    </div>

