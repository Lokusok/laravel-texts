<x-layout>
    <div class="flex justify-between items-center gap-x-[30px] mb-[30px] border-b border-b-gray-700">
        <h1 class="font-bold text-[30px]">
            {{ $song->title }}
        </h1>

        <div class="flex gap-x-3">
            <form action="{{ route('songs.pdf', [$song]) }}" method="POST">
                @csrf

                <button
                    class="px-3 py-1 rounded-md cursor-pointer bg-red-700 hover:bg-red-600 text-white font-bold"
                >
                    Экспорт в PDF
                </button>
            </form>

            <form action="{{ route('songs.docx', [$song]) }}" method="POST">
                @csrf

                <button
                    class="px-3 py-1 rounded-md cursor-pointer bg-blue-700 hover:bg-blue-600 text-white font-bold"
                >
                    Экспорт в DOCX
                </button>
            </form>
        </div>
    </div>

    <div class="mb-[30px] flex gap-x-[20px]">
        <div>
            <form action="{{ route('songs.destroy', [$song]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="bg-red-700 hover:bg-red-600 active:opacity-50 text-white font-bold rounded-md px-3 py-1 cursor-pointer">
                    Удалить
                </button>
            </form>
        </div>
    </div>

    <div class="flex flex-col gap-y-[30px]">
        @foreach ($song->quatrains as $quatrain)
            <div>
                <div>{{ $quatrain->body }}</div>
                <div>{{ $quatrain->order }}</div>
            </div>
        @endforeach
    </div>
</x-layout>
