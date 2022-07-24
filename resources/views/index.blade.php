
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
            <form method="post" action="/todo/create">
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

                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            {{-- <form method="post" action="{{ route('todos.update', $todo) }}"> --}}
                            <form method="post" action="/todo/update">
                                @csrf
                                <td>
                                    <input type="text" name="content" value="{{ $item->content }}">
                                </td>
                                <td>
                                    <button>更新</button>
                                </td>
                            </form>

                            <td>
                                <form method="post" action="/todo/delete">
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

