<!DOCTYPE html>

<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Moje úkoly</title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif;
            background: #171717;
            color: #f5f5f5;
        }

        .page {
            min-height: 100vh;
            padding: 60px 20px;
        }

        .container {
            width: 100%;
            max-width: 680px;
            margin: 0 auto;
        }

        /* Header */

        .header {
            margin-bottom: 28px;
        }

        .header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 700;
            letter-spacing: -0.5px;
            color: #f5f5f5;
        }

        .header p {
            margin: 7px 0 0;
            color: #8e8e93;
            font-size: 15px;
        }

        /* Přidání úkolu */

        .add-task {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 22px;
        }

        .input-wrapper {
            position: relative;
            flex: 1;
        }

        .input-wrapper i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #77777c;
            font-size: 14px;
        }

        .add-task input {
            width: 100%;
            height: 46px;
            padding: 0 15px 0 40px;
            border: 1px solid #38383a;
            border-radius: 10px;
            background: #242424;
            color: #f5f5f5;
            font-size: 15px;
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s;
        }

        .add-task input::placeholder {
            color: #77777c;
        }

        .add-task input:focus {
            border-color: #66666a;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.05);
        }

        .add-task button {
            height: 46px;
            padding: 0 17px;
            border: none;
            border-radius: 10px;
            background: #f5f5f5;
            color: #171717;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.15s;
        }

        .add-task button:hover {
            background: #dcdcdc;
        }

        /* Seznam */

        .tasks {
            background: #242424;
            border: 1px solid #38383a;
            border-radius: 12px;
            overflow: hidden;
        }

        /* Jeden úkol */

        .task {
            display: flex;
            align-items: center;
            min-height: 64px;
            padding: 10px 16px;
            border-bottom: 1px solid #353537;
            transition: background 0.15s;
        }

        .task:last-child {
            border-bottom: none;
        }

        .task:hover {
            background: #292929;
        }

        /* Formulář pro dokončení */

        .complete-form {
            margin: 0;
            margin-right: 13px;
        }

        /* Kolečko */

        .check-button {
            width: 23px;
            height: 23px;
            padding: 0;
            border: 1.5px solid #77777c;
            border-radius: 50%;
            background: transparent;
            color: #171717;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.18s ease;
        }

        .check-button:hover {
            border-color: #b0b0b5;
            background: #333335;
        }

        .check-button i {
            font-size: 11px;
            opacity: 0;
            transform: scale(0.5);
            transition: all 0.18s ease;
        }

        /* Dokončený úkol */

        .check-button.checked {
            border-color: #f5f5f5;
            background: #f5f5f5;
        }

        .check-button.checked i {
            opacity: 1;
            transform: scale(1);
        }

        .task-title {
            flex: 1;
            font-size: 15px;
            line-height: 1.4;
            padding-right: 15px;
            color: #eeeeee;
            transition: color 0.18s;
        }

        .task-title.completed {
            color: #77777c;
            text-decoration: line-through;
        }

        /* Koš */

        .delete-form {
            margin: 0;
        }

        .delete-button {
            width: 34px;
            height: 34px;
            border: none;
            border-radius: 8px;
            background: transparent;
            color: #77777c;
            cursor: pointer;
            opacity: 0;
            transition: all 0.15s;
        }

        .task:hover .delete-button {
            opacity: 1;
        }

        .delete-button:hover {
            background: #353537;
            color: #d0d0d0;
        }

        .delete-button i {
            font-size: 14px;
        }

        /* Prázdný seznam */

        .empty {
            padding: 55px 20px;
            text-align: center;
            color: #77777c;
        }

        .empty i {
            display: block;
            margin-bottom: 13px;
            font-size: 27px;
            color: #55555a;
        }

        .empty p {
            margin: 0;
            font-size: 14px;
        }

        /* Chyba */

        .error {
            margin-bottom: 15px;
            padding: 11px 14px;
            background: #321f20;
            border: 1px solid #553536;
            border-radius: 9px;
            color: #e39b9b;
            font-size: 14px;
        }

        /* Mobil */

        @media (max-width: 600px) {

            .page {
                padding: 35px 15px;
            }

            .header h1 {
                font-size: 28px;
            }

            .add-task {
                gap: 8px;
            }

            .add-task button {
                padding: 0 14px;
            }

            .task {
                padding: 10px 13px;
            }

            .delete-button {
                opacity: 1;
            }
        }
    </style>

</head>

<body>

<div class="page">

    <main class="container">

        <header class="header">
            <h1>Moje úkoly</h1>
            <p>Co je potřeba dnes udělat?</p>
        </header>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form class="add-task" action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="input-wrapper">
                <i class="fa-solid fa-plus"></i>

                <input
                    type="text"
                    name="title"
                    placeholder="Přidat úkol..."
                    maxlength="255"
                    autocomplete="off"
                    required
                >
            </div>

            <button type="submit">
                Přidat
            </button>
        </form>

        <section class="tasks">

            @forelse($tasks as $task)

                <div class="task">

                    <form
                        class="complete-form"
                        action="{{ route('tasks.complete', $task) }}"
                        method="POST"
                    >
                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            class="check-button {{ $task->completed ? 'checked' : '' }}"
                            title="{{ $task->completed ? 'Označit jako nedokončené' : 'Označit jako hotové' }}"
                        >
                            <i class="fa-solid fa-check"></i>
                        </button>
                    </form>

                    <div class="task-title {{ $task->completed ? 'completed' : '' }}">
                        {{ $task->title }}
                    </div>

                    <form
                        class="delete-form"
                        action="{{ route('tasks.destroy', $task) }}"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="delete-button"
                            title="Smazat úkol"
                        >
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>

                </div>

            @empty

                <div class="empty">
                    <i class="fa-regular fa-circle-check"></i>

                    <p>
                        Zatím nemáte žádné úkoly.
                    </p>
                </div>

            @endforelse

        </section>

    </main>

</div>

</body>
</html>
