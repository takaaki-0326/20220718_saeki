<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()//フォームに入力されたtodoを$todoに代入する
    {
        $todos = Todo::latest()->get();

        return view('index')
            ->with(['todos' => $todos]);//$todosを'todos'に代入してindex.blade.phpに送る
    }

    public function create(Request $request)
    {
        $todo = new Todo();
        $todo->content = $request->content;
        $todo->save();

        return redirect()
            ->route('todos.index');
    }


// public function create(Request $request)
//     {
//         $this->validate($request, Todo::$rules);
//         $form = $request->all();
//         Todo::create($form);
//         return redirect('/');
//     }
}
