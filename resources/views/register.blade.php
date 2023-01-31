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
    <a href="http://localhost/ToDoList/public/register"><img class="w-24" src="images/logo3.png" alt=""
        class="logo" /></a>
  </nav>
  <main>
    <div class="mx-4">
      <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
          <h2 class="text-2xl font-bold uppercase mb-1">
            REGISTER
          </h2>
        </header>

        <form method="POST" action="http://localhost/ToDoList/public/register/users">
          @csrf
          <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2"> Name </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{old('name')}}" />
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2">Email</label>
            <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
              value="{{old('email')}}" />

            @error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-6">
            <label for="password" class="inline-block text-lg mb-2">
              Password
            </label>
            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
              value="{{old('password')}}" />

            @error('password')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-6">
            <label for="password2" class="inline-block text-lg mb-2">
              Confirm Password
            </label>
            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation"
              value="{{old('password_confirmation')}}" />

            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-6">
            <button type="submit" class="bg-gray-200 text-black rounded py-2 px-4">
              Sign Up
            </button>
          </div>

          <div class="mt-8">
            <p>
              Already have an account?
              <a href="http://localhost/ToDoList/public/" class="text-gray-400">Login</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </main>
</body>
<footer
  class="fixed bottom-0 left-0 w-full flex items-center justify-start bg-gray-200 text-black h-24 mt-24 opacity-90 md:justify-center">
  <p class="ml-2">"ToDo List"</p>
  <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>
</footer>

</html>