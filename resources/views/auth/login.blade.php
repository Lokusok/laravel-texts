<x-layout>
    <div class="mb-[20px] pb-[20px] border-b border-b-gray-700">
        <h3 class="font-bold text-[20px]">Войти в админку</h3>
    </div>

    <div>
        <form class="flex flex-col gap-y-[20px]" action="{{ route('auth.authenticate') }}" method="POST">
            @csrf

            <div>
                <label>
                    Логин:
                    <input
                        @class([
                            "border border-gray-700 px-2 py-1",
                            "border border-red-500" => $errors->has('login')
                        ])
                        type="text"
                        name="login"
                    >

                    <div class="mt-[10px] text-red-500 text-[12px]">
                        @error('login')
                            {{ $message }}
                        @enderror
                    </div>
                </label>
            </div>

            <div>
                <label>
                    Пароль:
                    <input
                        @class([
                            "border border-gray-700 px-2 py-1",
                            "border border-red-500" => $errors->has('password')
                        ])
                        type="text"
                        name="password"
                    >

                    <div class="mt-[10px] text-red-500 text-[12px]">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </label>
            </div>

            <div>
                <button
                    type="submit"
                    class="px-3 py-1 rounded-md cursor-pointer bg-blue-700 hover:bg-blue-600 text-white font-bold"
                >
                    Войти
                </button>
            </div>
        </form>
    </div>
</x-layout>
