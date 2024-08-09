<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        return view('index', [
            'i' => User::latest()->first(),
            'categories' => Category::all()
        ]);
    }
    public function store(Request $request)
    {
        $todos = $request->input('todos');
        $nickname = $request->input('nickname');
        $username = $request->input('username');
        $email = $request->input('email');

        $validator = Validator::make($request->all(), [
            'nickname' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
        ]);
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|unique:users,email',
        //     'username' => 'required|unique:users,username',
        // ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // 422 Unprocessable Entity status code
        }

        User::create([
            'name' => $nickname,
            'email' => $email,
            'username' => $username,
        ]);

        foreach ($todos as $todoData) {
            $validatedData = $request->validate([
                'todos.*.category_id' => 'required',
                'todos.*.description' => 'required',
                'todos.*.user_id' => 'required',
            ]);
            Task::create([
                'description' =>  $todoData['description'],
                'category_id' => $todoData['category_id'],
                'user_id' => $todoData['user_id']
            ]);
        }

        return response()->json(['success' => 'To Dos created successfully!'], 200);
    }

    // api
    public function apiIndex()
    {
        $tasks = Task::all();

        return response()->json([
            'tasks' => $tasks
        ]);
    }
    public function apiSoftDelete($id)
    {
        
        $tasks = Task::find($id);

        if ($tasks) {
            $tasks->delete(); // Soft deletes the record
            return response()->json(['message' => 'Task success deleted'], 200);
        }

        return response()->json(['message' => 'Task not found'], 404);
    }
}
