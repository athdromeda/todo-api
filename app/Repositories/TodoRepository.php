<?php

namespace App\Repositories;

use App\Models\Todo;

class TodoRepository
{
    public function getAllTodo()
    {
        return Todo::all();
    }

    public function getTodoById($id)
    {
        return Todo::where('id', $id)->firstOrFail();
    }

    public function createTodo($tugas, $deskripsi)
    {
        return Todo::create([
            'tugas' => $tugas,
            'deskripsi' => $deskripsi,
        ]);
    }

    public function deleteTodo($id)
    {
        return $this->getTodoById($id)->delete();
    }

    public function updateTodo($id, $newTodo)
    {
        return $this->getTodoById($id)->update($newTodo);
    }
}