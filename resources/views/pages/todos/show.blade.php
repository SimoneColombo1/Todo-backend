@extends('layouts.app')

@section('content')


    <div class="index-container">
        <h1>Todo List</h1>


        <ul>

                <li>
                    <span>{{ $todo->title }} </span>
                    <span> {{ $todo->description }}</span>
                    <span> {{ $todo->created_at }}</span>
                    <span> {{ $todo->updated_at }}</span>
                    <span> {{ $todo->completed ? 'Completed' : 'Not Completed' }}</span>
                    <span> {{ $todo->priority }}</span>
                    {{ $todo->due_date }}
                    <span>
                </li>

        </ul>
