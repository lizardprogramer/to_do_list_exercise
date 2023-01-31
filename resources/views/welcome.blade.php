<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/logo3.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#8BBD8B",
                        },
                    },
                },
            };
    </script>
    <title>To Do List</title>
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="http://localhost/ToDoList/public/index"><img class="w-24" src="images/logo3.png" alt=""
                class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
            <li>
                <span class="">
                    User: {{auth()->user()->name}}
                </span>
            </li>
            <li>
                <form class="inline" method="POST" action="http://localhost/ToDoList/public/index/logout">
                    @csrf
                    <button type="submit" class="text-black-300">
                        <i class="text-black-300 fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            </li>
            @endauth
        </ul>
    </nav>
    <main>
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Post a new task
                    </h2>
                    <p class="mb-4"></p>
                </header>

                <form method="POST" action="http://localhost/ToDoList/public/index/post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="task_description" rows="5"
                            placeholder="Describe your task..."></textarea>
                        @error('task_description')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button class="bg-gray-200 text-black rounded py-2 px-4">
                            Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <p class="mb-4"></p>
    </main>
    @unless(count($tasks) == 0)
    <table class="w-full table-auto rounded-sm">
        <tbody>
            @foreach ($tasks as $task)
            @if($task->confirmed)
            <tr class="border-gray-300 bg-laravel">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-white">
                    <p>
                        {{$task->task_description}}
                    </p>
                </td>
                <td class="px-4 py-5 border-t border-b border-gray-300 text-lg">
                    <a href="http://localhost/ToDoList/public/index/edit/{{$task->id}}"
                        class="text-white px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i>
                        Edit</a>
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <form method="POST" action="http://localhost/ToDoList/public/index/tasks/{{$task->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-white">
                            <i class="fa-solid fa-trash-can"></i>
                            Delete
                        </button>
                    </form>
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <form method="post" action="http://localhost/ToDoList/public/index/tasks/{{$task->id}}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="confirmed" value="false">
                        <div class="w100">
                            <button class="text-white">
                                <i class="fa-solid fa-x"></i>
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
            @else
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-black-400">
                    <p>
                        {{$task->task_description}}
                    </p>
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="http://localhost/ToDoList/public/index/edit/{{$task->id}}"
                        class="text-blue-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i>
                        Edit</a>
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <form method="POST" action="http://localhost/ToDoList/public/index/tasks/{{$task->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-400">
                            <i class="fa-solid fa-trash-can"></i>
                            Delete
                        </button>
                    </form>
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <form method="post" action="http://localhost/ToDoList/public/index/tasks/{{$task->id}}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="confirmed" value="true">
                        <div class="w100">
                            <button class="text-laravel">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    @else
    <tr class="border-gray-300">
        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <p class="text-center">No Tasks Found</p>
        </td>
    </tr>
    @endunless

</body>
<p class="mb-4"></p>
@unless(count($tasks) == 0)
<header class="text-center">
    {{count($tasks->where('confirmed', true))}}/{{count($tasks)}} tasks completed
    @unless(count($tasks->where('confirmed', true)) == count($tasks))
    <p class="mb-4"></p>
    @else
    <p class="mb-4"></p>
    <p class="mb-4">Congrats! You finished all the tasks!</p>
    @endunless
</header>
@endunless
</body>

<x-flash-message />

</html>