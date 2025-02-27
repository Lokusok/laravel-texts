<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="mx-[30px] py-2 border-b border-b-gray-700 flex gap-x-[20px]">
        @auth
            <a
                href="{{ route('songs.index') }}"
                @class([
                    "text-blue-700 hover:text-blue-500 active:opacity-50",
                    'underline' => request()->routeIs('songs.index')
                ])
            >
                Мои тексты
            </a>

            <a
                href="{{ route('songs.create') }}"
                @class([
                    "text-blue-700 hover:text-blue-500 active:opacity-50",
                    'underline' => request()->routeIs('songs.create')
                ])
            >
                Новый текст
            </a>
        @endauth

        @guest
            <a
                href="{{ route('auth.login') }}"
                @class([
                    "text-blue-700 hover:text-blue-500 active:opacity-50",
                    'underline' => request()->routeIs('auth.login')
                ])
            >
                Войти
            </a>
        @endguest
    </div>

    <div class="p-[30px]">

        {{ $slot }}
    </div>
</body>
</html>
