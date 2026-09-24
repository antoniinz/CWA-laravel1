<!DOCTYPE html>

<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    ```
    <title>Úkoly</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #eeeeee;
            color: #222;
        }

        .page {
            width: 100%;
            min-height: 100vh;
            padding: 50px 20px;
        }

        .container {
            width: 100%;
            max-width: 720px;
            margin: 0 auto;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0 0 6px;
            font-size: 32px;
            font-weight: 700;
        }

        .header p {
            margin: 0;
            color: #777;
            font-size: 15px;
        }

        .add-task {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }

        .add-task input {
            flex: 1;
            height: 46px;
            padding: 0 14px;
            border: 1px solid #d0d0d0;
            border-radius: 6px;
            background: white;
            font-size: 15px;
            outline: none;
        }

        .add-task input:focus {
            border-color: #888;
        }

        .add-task button {
            height: 46px;
            padding: 0 20px;
            border: none;
            border-radius: 6px;
            background: #222;
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

        .add-task button:hover {
            background: #000;
        }

        .tasks {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .task {
            display: flex;
            align-items: center;
            min-height: 62px;
            padding: 10px 12px 10px 16px;
            background: white;
            border: 1px solid #dedede;
            border-radius: 6px;
        }

        .task-title {
            flex: 1;
            font-size: 15px;
            line-height: 1.4;
            padding-right: 15px;
        }

        .task-title.completed {
            color: #999;
            text-decoration: line-through;
        }

        .actions {
            display: flex;
            gap: 6px;
        }

        .actions form {
            margin: 0;
        }

        .actions button {
            border: none;
            border-radius: 5px;
            padding: 8px 11px;
            font-size: 13px;
            cursor: pointer;
        }

        .complete {
            background: #e7f2e9;
            color: #27733a;
        }

        .complete:hover {
            background: #d9ebdc;
        }

        .delete {
            background: #f4e5e5;
            color: #a33a3a;
        }

        .delete:hover {
            background: #ecd5d5;
        }

        .empty {
            padding: 35px 20px;
            text-align: center;
            background: white;
            border: 1px solid #dedede;
            border-radius: 6px;
            color: #888;
            font-size: 14px;
        }

        .error {
            margin-bottom: 15px;
            padding: 10px 13px;
            background: #f4e5e5;
            border: 1px solid #e5caca;
            border-radius: 6px;
            color: #a33a3a;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            .page {
                padding: 30px 15px;
            }

            .header h1 {
                font-size: 27px;
            }

            .add-task {
                flex-direction: column;
            }

            .add-task button {
                width: 100%;
            }

            .task {
                align-items: flex-start;
                flex-direction: column;
                gap: 12px;
                padding: 14px;
            }

            .task-title {
                padding-right: 0;
            }

            .actions {
                width: 100%;
            }

            .actions form {
                flex: 1;
            }

            .actions button {
                width: 100%;
            }
        }
    </style>
    ```

</head>

<body>

<div class="page">

    ```
    <main class="container">

        <header class="header">
            <h1>Moje úkoly</h1>
            <p>Jednoduchý přehled úkolů na jednom místě.</p>
        </header>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form class="add-task" action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <input
                type="text"
                name="title"
                placeholder="Napište nový úkol..."
                maxlength="255"
                required
            >

            <button type="submit">
                Přidat úkol
            </button>
        </form>

        <section class="tasks">

            @forelse($tasks as $task)

                <div class="task">

                    <div class="task-title {{ $task->completed ? 'completed' : '' }}">
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

            @empty

                <div class="empty">
                    Zatím nemáte žádné úkoly.
                </div>

            @endforelse

        </section>

    </main>
    ```

</div>

</body>
</html>
