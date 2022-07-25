<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()//フォームに入力されたtodoを$todoに代入する
    {
        $items = DB::table('todos')->get();
        return view('index', ['items' => $items]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $param = [
            'content' => $request->content,
        ];
        DB::table('todos')->insert($param);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $param = [
            'id' => $request->id,
            'content' => $request->content,
        ];
        DB::table('todos')->where('id', $request->id)->update($param);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $param = ['id' => $request->id];
        DB::table('todos')->where('id', $request->id)->delete($param);
        return redirect('/');
    }
}

