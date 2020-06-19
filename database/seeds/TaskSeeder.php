<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::all()->each(function($category) {
            factory(\App\Task::class, 5)->create(['category_id' => $category->id])->each(function($task) {
                $task->save();
            });
        });
    }
}
