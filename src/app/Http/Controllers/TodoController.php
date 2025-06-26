<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;


class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('index', compact('todos'));
        // return view('index', ['todos' => $todos]);
    }

    // public function store(Request $request)
    public function store(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        Todo::create($todo);
        
        // return view('/todos');
        return redirect('/')->with('message', 'Todoを作成しました');
        return redirect('/')->with('error', 'Todoを作成してください');
    }

    public function update(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        Todo::find($request->id)->update($todo);

        return redirect('/')->with('message', 'Todoを更新しました');
    }

}

