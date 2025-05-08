<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Todo=[
            [
                'title' => 'Buy groceries',
                'description' => 'Milk, Bread, Eggs',
                'completed' => false,
                'due_date' => '2025-07-15',
                'priority' => 'high',
            ],
            [
                'title' => 'Finish project report',
                'description' => 'Complete the final report for the project',
                'completed' => false,
                'due_date' => '2025-06-20',
                'priority' => 'medium',
            ],
            [
                'title' => 'Call mom',
                'description' => 'call mom',
                'completed' => false,
                'due_date' => '2025-06-20',
                'priority' => 'low',
            ],
        ];
        foreach ($Todo as $todo) {
          $todo=new Todo();
            $todo->title=$todo['title'];
            $todo->description=$todo['description'];
            $todo->completed=$todo['completed'];
            $todo->due_date=$todo['due_date'];
            $todo->priority=$todo['priority'];
            $todo->save();
        }
    }
}
