<x-layout>
    <x-alerts.success />

    <form
        class="flex flex-col gap-y-3"
        action="{{ route('songs.store') }}"
        method="POST"
    >
        @csrf

        <div class="mb-[20px] pb-[20px] border-b border-b-gray-700">
            <label>
                Название песни:

                <input
                    class="px-3 py-1 border border-gray-400"
                    type="text"
                    name="title"
                >
            </label>
        </div>

        <div class="flex gap-x-3 items-center">
            <textarea
                class="p-3 border border-gray-400 resize-none"
                name="quatrain_1"
            ></textarea>
            <label>
                Порядок:

                <input
                    type="number"
                    placeholder="Порядок"
                    class="p-1 border border-gray-400 resize-none"
                    name="order_1"
                    value="1"
                />
            </label>
        </div>

        <div class="flex gap-x-3 items-center">
            <textarea
                class="p-3 border border-gray-400 resize-none"
                name="quatrain_2"
            ></textarea>
            <label>
                Порядок:

                <input
                    type="number"
                    placeholder="Порядок"
                    class="p-1 border border-gray-400 resize-none"
                    name="order_2"
                    value="2"
                />
            </label>
        </div>

        <div class="flex gap-x-3 items-center">
            <textarea
                class="p-3 border border-gray-400 resize-none"
                name="quatrain_3"
            ></textarea>
            <label>
                Порядок:

                <input
                    type="number"
                    placeholder="Порядок"
                    class="p-1 border border-gray-400 resize-none"
                    name="order_3"
                    value="3"
                />
            </label>
        </div>

        <div>
            <button
                type="submit"
                class="cursor-pointer bg-blue-600 hover:bg-blue-500 text-white px-3 py-2 rounded-md active:opacity-70"
            >
                Создать
            </button>
        </div>
    </form>
</x-layout>
