<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>LaraStore | Store your favourite content</title>
</head>

<body class="mb-48">

    <x-flash-message/>  
    <nav class="flex justify-between items-center mb-4">
        <a href="/"><img class="w-32" src="{{ asset('images/logo.png') }}" alt="" class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">

            @auth
            <li>
                <span class="uppercase font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-orange-500">
                    Welcome {{auth()->user()->name}}
                </span>
            </li>
            <li>
                <a href="/listing/manage" class="hover:text-red-600"><i class="fa-solid fa-gear"></i>
                    Manage Content</a>
            </li>

            <li class="inline">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i>Sign out
                    </button>
                </form>
            </li>
            @else
            <li>
                <a href="/register" class="hover:text-red-600"><i class="fa-solid fa-user-plus"></i> Sign up</a>
            </li>
            <li>
                <a href="/login" class="hover:text-red-600"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Sign in</a>
            </li>
            @endauth
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>
    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-gradient-to-r from-red-600/75 to-orange-600 text-white h-24 mt-24  md:justify-center">
        <p class="ml-2">Mykola Marenich &copy; 2023, All Rights reserved</p>
        <a href="/listings/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Add new stuff</a>
    </footer>
</body>

</html>
