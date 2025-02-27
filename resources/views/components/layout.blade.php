@props([
    'title' => 'Laravel',
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    @vite(['resources/css/app.css'])
</head>
<body>
    <div class="mx-[30px] py-2 border-b border-b-gray-700 flex gap-x-[20px] items-center justify-between">
        @auth
            <div class="flex gap-x-[20px]">
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
            </div>

            <div class="flex gap-x-[20px]">
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf

                    <button type="submit" class="bg-red-700 hover:bg-red-600 active:opacity-50 text-white font-bold rounded-md px-3 py-1 cursor-pointer">
                        Выйти
                    </button>
                </form>
            </div>
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

    @stack('scripts')
</body>
</html>
