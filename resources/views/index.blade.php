
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COACHTECH</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Todo List</h1>
            <form method="post" action="{{ route('todos.create') }}">
                @csrf
                <input type="text" name="content">{{-- もしくは""content"でも良い。このneme属性は、todosテーブルのどのカラムに挿入するかを指定している --}}
                <button class="add-button">追加</button>
            </form>
            <div class="todo-items">
                <table>
                    <tr>
                        <th>作成日</th>
                        <th>タスク名</th>
                        <th>更新</th>
                        <th>削除</th>
                    </tr>

                    {{-- @foreach ($todos as $todo)
                        <tr>
                            <td>{{ $todo->created_at }}</td>
                            <td><input type="text" name="content" value="{{ $todo->content }}"></td>
                            {{-- ここから教材 --}}
                            {{-- <td>
                                <form method="post" action="/todo/update">
                                    @csrf
                                    <button>更新</button>
                                </form>
                            </td> --}}
                            {{-- ここまで教材 --}}
                            {{-- <td>
                                <form method="post" action="{{ route('todos.delete', $todo) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button>削除</button>
                                </form><br>
                            </td>
                        </tr>
                    @endforeach --}}


                    {{-- @foreach ($todos as $todo)
                        <tr>
                            <td>{{ $todo->created_at }}</td>
                            <td><input type="text" value="{{ $todo->content }}"></td>
                            <td><button>更新</button></td>
                            <td><button>削除</button><br></td>
                        </tr>
                    @endforeach --}}

                    @foreach ($todos as $todo)
                        <tr>
                            <td>{{ $todo->created_at }}</td>
                            <td><input type="text" name="content" value="{{ $todo->content }}"></td>
                            <td>
                                <form method="post" action="{{ route('todos.update', $todo) }}">
                                    @method('PATCH')
                                    @csrf
                                    <button>更新</button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{ route('todos.delete', $todo) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button>削除</button>
                                </form><br>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>

