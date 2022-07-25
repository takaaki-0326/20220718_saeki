
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
            @if (count($errors) > 0)
            <ul>
                <li>The content field is required.</li>
            </ul>
            @endif
            <form method="post" action="/todo/create">
                @csrf
                <div class="create-flexbox">
                    <input type="text" name="content" class=create-text>
                    <button class="add-button">追加</button>
                </div>
            </form>
            <div class="todo-items">
                <table>
                    <div class="todo-items__title">
                        <tr>
                            <th>作成日</th>
                            <th>タスク名</th>
                            <th>更新</th>
                            <th>削除</th>
                        </tr>
                    </div>
                    @foreach ($items as $item)
                        <tr>
                            <form method="post" action="/todo/update/{{ $item->id }}">
                                @csrf
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <input type="text" name="content" value="{{ $item->content }}" class="update-input">
                                </td>
                                <td>
                                    <button class="update-button">更新</button>
                                </td>
                            </form>
                            <td>
                                <form method="post" action="/todo/delete/{{ $item->id }}">
                                    @csrf
                                    <button class="delete-button">削除</button>
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
