<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="http://localhost/ToDoList/public/images/logo3.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
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
        <a href="http://localhost/ToDoList/public/index"><img class="w-24"
                src="http://localhost/ToDoList/public/images/logo3.png" alt="" class="logo" /></a>
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
                        Edit your task
                    </h2>
                    <p class="mb-4"></p>
                </header>

                <form method="POST" action="http://localhost/ToDoList/public/index/task/{{$task->id}}">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="task_description"
                            rows="5">{{$task->task_description}}</textarea>
                        @error('task_description')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button class="bg-gray-200 text-black rounded py-2 px-4">
                            Edit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>