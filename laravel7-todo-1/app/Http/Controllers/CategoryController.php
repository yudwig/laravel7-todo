<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCreateView()
    {
        return view('categories.create');
    }

    public function showEditView($id)
    {
        return view('categories.edit', [
            'category' => \App\Category::where('id', $id)->first()
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => ['required']
        ]);
        $category = \App\Category::create([
            'title' => $request['title']
        ]);
        $category->save();
        return redirect(route('tasks.showIndex'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required']
        ]);
        $category = \App\Category::where('id', $id)->first();
        $category->fill([
            'title' => $request['title']
        ]);
        $category->save();
        return redirect(route('tasks.showIndex'));
    }

    public function delete($id)
    {
        $category = \App\Category::where('id', $id)->first();
        $category->delete();
        return redirect(route('tasks.showIndex'));
    }
}
