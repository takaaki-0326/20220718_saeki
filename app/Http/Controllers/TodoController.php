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


    // public function update(Request $request, Todo $todo)
    // {
    //     $todo->content = $request->content;
    //     $todo->save();

    //     return redirect()
    //         ->route('todos.index', $todo);
    // }

// ここから教材
    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::where('content', $request->content)->update($form);
        return redirect()
            ->route('todos.index');
    }
// ここまで教材

    // public function delete(Request $request)
    // {
    //     $todo = Todo::find($request->id);
    //     return view('delete', ['todo' => $todo]);
    // }

    public function delete(Todo $todo)
    {
        $todo->delete();
        return redirect()
            ->route('todos.index');
    }
}
