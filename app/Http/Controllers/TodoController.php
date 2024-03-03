<?php

namespace App\Http\Controllers;

use App\Repositories\TodoRepository;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    private TodoRepository $todoRepo;

    public function __construct()
    {
        $this->todoRepo = new TodoRepository();
    }
    public function index()
    {
        return $this->todoRepo->getAllTodo();
    }

    public function create(Request $request)
    {
        $this->todoRepo->createTodo($request->tugas, $request->deskripsi);

        return response([
            'message' => 'Input data success!',
            'req' => [
                'tugas' => $request->tugas,
                'deskripsi' => $request->deskripsi,
            ]
        ], 200);
    }

    public function delete(Request $request)
    {
        $this->todoRepo->deleteTodo($request->id);

        return response([
            'message' => 'Delete data success!',
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $this->todoRepo->updateTodo($id, $request->all());

        return response([
            'message' => 'Update data success!',
            'req' => [
                'id' => $id,
                'tugas' => $request->tugas,
                'deskripsi' => $request->deskripsi,
            ]
        ], 200);
    }

}
