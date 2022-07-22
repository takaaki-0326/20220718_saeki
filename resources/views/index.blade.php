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
                <input type="text" name="task">
                <button class="add-button" type="submit">追加</button>
            </form>
            <div class="todo-items">
                <table>
                    <tr>
                        <th>作成日</th>
                        <th>タスク名</th>
                        <th>更新</th>
                        <th>削除</th>
                    </tr>

                    {{-- <tr> --}}
                        {{-- <td>2022/07/01</td>
                        @foreach ($todos as $todo)
                            <td><input type="text" value="{{ route('index', $todo->id) }}">
                                {{ $todo->content }}
                            </td>
                        @endforeach
                        <td><button>更新</button></td>
                        <td><button>削除</button></td> --}}
                    {{-- </tr> --}}
                    {{-- <tr>
                        <td>{{ $todos[0]->created_at }}</td>
                        <td><input type="text" value="{{ $todos[0]->content }}"></td>
                        <td><button>更新</button></td>
                        <td><button>削除</button></td>
                    </tr> --}}
                    {{-- <tr>
                        @forelse ($posts as $post)
                        <td>{{ route('todos->created_at }}</td>
                        <td><input type="text" value="{{ $todos[0]->content }}"></td>
                        <td><button>更新</button></td>
                        <td><button>削除</button></td>
                    </tr> --}}


                        @foreach ($todos as $todo)
                            <tr>
                                <td>{{ $todo->created_at }}</td>
                                <td><input type="text" value="{{ $todo->content }}"></td>
                                <td><button>更新</button></td>
                                <td><button>削除</button><br></td>
                            </tr>
                        @endforeach


                </table>
            </div>
        </div>
    </div>
</body>
</html>
