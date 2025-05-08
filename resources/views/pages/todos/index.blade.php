
@extends('layouts.app')

@section('content')


<div class="index-container">
    <h1>Todo List</h1>


    <ul>
        @foreach($todos as $todo)
            <li>
                {{ $todo->title }}
                {{ $todo->description }}
                {{ $todo->created_at }}
                {{ $todo->updated_at }}
                {{ $todo->completed ? 'Completed' : 'Not Completed' }}
                {{ $todo->priority}}
                {{ $todo->due_date}}

            </li>

        @endforeach
    </ul>
