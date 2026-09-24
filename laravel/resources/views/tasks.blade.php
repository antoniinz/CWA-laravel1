<!DOCTYPE html>

<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Správa úkolů</title>

    ```
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            margin-top: 0;
        }

        form {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }

        input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add {
            background: #222;
            color: white;
        }

        .task {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px;
            margin-bottom: 10px;
            background: #f5f5f5;
            border-radius: 5px;
        }

        .task-name {
            flex: 1;
        }

        .completed {
            text-decoration: line-through;
            color: #888;
        }

        .actions {
            display: flex;
            gap: 5px;
        }

        .complete {
            background: #4caf50;
            color: white;
        }

        .delete {
            background: #e53935;
            color: white;
        }
    </style>
    ```

</head>

<body>

<div class="container">

    ```
    <h1>Správa úkolů</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <input
            type="text"
            name="title"
            placeholder="Zadej nový úkol..."
            required
        >

        <button class="add" type="submit">
            Přidat
        </button>
    </form>

    @foreach($tasks as $task)

        <div class="task">

            <div class="task-name {{ $task->completed ? 'completed' : '' }}">
                {{ $task->title }}
            </div>

            <div class="actions">

                <form action="{{ route('tasks.complete', $task) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <button class="complete" type="submit">
                        {{ $task->completed ? 'Vrátit' : 'Hotovo' }}
                    </button>
                </form>

                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="delete" type="submit">
                        Smazat
                    </button>
                </form>

            </div>

        </div>

    @endforeach
    ```

</div>

</body>
</html>
