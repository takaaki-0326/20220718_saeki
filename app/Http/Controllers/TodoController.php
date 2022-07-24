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
        $param = [
            'id' => $request->id,
            'content' => $request->content,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ];
        DB::table('todos')->insert($param);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'content' => $request->content,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ];
        DB::table('todos')->find('id', $request->id)->update($param);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $param = [
            'id' => $request->id,
            'content' => $request->content,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ];
        DB::table('todos')->find('content', $request->content)->delete();
        return redirect('/');
    }

}

