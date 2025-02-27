<x-layout title="Все текста">
    <x-alerts.success />

    <div class="flex flex-col gap-y-[30px]">
        @forelse ($songs as $song)
            <div
                class="p-3 rounded-md shadow-md"
            >
                <div class="flex gap-x-3 items-center">
                    <h3 class="text-[20px] font-bold">
                        {{ $song->title }}
                    </h3>

                    <a
                        class="text-blue-700 hover:text-blue-500 active:opacity-50 text-[12px]"
                        href="{{ route('songs.show', [$song]) }}"
                    >
                        (Посмотреть)
                    </a>
                </div>

                <p class="text-gray-500 text-[14px]">
                    Создано: {{ $song->created_at->format('d.m.Y') }}
                </p>
            </div>
        @empty
            Текстов нет
        @endforelse
    </div>

    <div class="mt-[60px]">
        {{ $songs->links() }}
    </div>
</x-layout>
