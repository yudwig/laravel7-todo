<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function showIndexView()
    {
        return view('tasks.index', [
            'categories' => \App\Category::with('task')->get()
        ]);
    }

    public function showCreateView()
    {
        return view('tasks.create');
    }

    public function showEditView($id)
    {
        return view('tasks.edit', [
            'task' => \App\Task::where('id', $id)->first()
        ]);
    }

    public function create(Request $request, $category_id)
    {
        $request->validate([
            'title' => ['required']
        ]);
        $task = \App\Task::create([
            'title' => $request['title'],
            'category_id' => $category_id,
            'completed' => $request['completed']
        ]);
        $task->save();
        return redirect(route('tasks.showIndex'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['sometimes', 'required']
        ]);
        $task = \App\Task::where('id', $id)->first();
        if (isset($request['title'])) {
            $task->title = $request['title'];
        }
        // TODO: 変更したので記事修正
        if (isset($request['completed'])) {
            $task->completed = $request['completed'];
        }
        $task->save();
        return redirect(route('tasks.showIndex'));
    }

    public function delete($id)
    {
        $task = \App\Task::where('id', $id)->first();
        $task->delete();
        return redirect(route('tasks.showIndex'));
    }
}

