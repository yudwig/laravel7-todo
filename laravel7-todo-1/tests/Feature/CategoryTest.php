<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testShowCreate()
    {
        $this->get(route('categories.showCreate'))
            ->assertViewIs('categories.create');
    }

    public function testShowEdit()
    {
        $this->seed();
        $this->get(route('categories.showEdit', ['id' => 1]))
            ->assertViewIs('categories.edit')
            ->assertViewHas('category');
    }

    public function testCreate()
    {
        $this->seed();
        $truth = [
            'title' => 'TestCreate'
        ];
        $this->post(route('categories.create'), [
                'title' => $truth['title']
            ])
            ->assertRedirect(route('tasks.showIndex'));
        $latest = \App\Category::orderBy('id', 'DESC')->first();
        $this->assertEquals($truth['title'], $latest['title']);

        $this->post(route('categories.create'), [
                'title' => ''
            ])
            ->assertSessionHasErrors('title');
    }

    public function testUpdate()
    {
        $this->seed();
        $id = 1;
        $truth = [
            'title' => 'TestUpdate'
        ];
        $this->post(route('categories.update', ['id' => $id]), [
                'title' => $truth['title']
            ])
            ->assertRedirect(route('tasks.showIndex'));
        $after = \App\Category::where('id', $id)->first();
        $this->assertEquals($truth['title'], $after['title']);

        $this->post(route('categories.update', ['id' => $id]), [
            'title' => ''
        ])
        ->assertSessionHasErrors('title');
    }

    public function testDelete()
    {
        $this->seed();
        $id = 1;
        $task = \App\Category::where('id', $id)->first();
        $this->post(route('categories.delete', ['id' => $id]))
            ->assertRedirect(route('tasks.showIndex'));
        $this->assertDeleted($task);
    }
}

