<x-layout title="Обновить текст">
    <x-alerts.success />

    <form
        id="edit-form"
        class="flex flex-col gap-y-3"
        action="{{ route('songs.update', [$song]) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <div class="mb-[20px] pb-[20px] border-b border-b-gray-700">
            <label>
                Название текста:

                <input
                    @class([
                        "px-3 py-1 border border-gray-400",
                        "border border-red-500" => $errors->has('title'),
                    ])
                    type="text"
                    name="title"
                    value="{{ $song->title }}"
                >
            </label>
        </div>

        <div class="flex gap-x-3 items-center">
            <div>
                <div data-to="quatrain_1" class="wysiwyg">
                    {!! $song->quatrains[0]->body !!}
                </div>
            </div>

            <textarea
                class="p-3 border border-gray-400 resize-none"
                id="quatrain_1"
                name="quatrain_1"
                hidden
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
            <div>
                <div data-to="quatrain_2" class="wysiwyg">
                    {!! $song->quatrains[1]->body !!}
                </div>
            </div>

            <textarea
                class="p-3 border border-gray-400 resize-none"
                id="quatrain_2"
                name="quatrain_2"
                hidden
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
            <div>
                <div data-to="quatrain_3" class="wysiwyg">
                    {!! $song->quatrains[2]->body !!}
                </div>
            </div>

            <textarea
                class="p-3 border border-gray-400 resize-none"
                id="quatrain_3"
                name="quatrain_3"
                hidden
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
                Обновить
            </button>
        </div>
    </form>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

        <script>
            const createForm = document.getElementById('edit-form');
            const wysiwygs = document.querySelectorAll('.wysiwyg');
            const quills = [];

            wysiwygs.forEach((wysiwyg) => {
                const quill = new Quill(wysiwyg, {
                    theme: 'snow'
                });

                quill.to = wysiwyg.dataset.to;
                quills.push(quill);
            });

            createForm.addEventListener('submit', () => {
                quills.forEach((quill) => {
                    const input = document.getElementById(quill.to);
                    input.value = quill.getSemanticHTML();
                });
            });
        </script>
    @endpush

</x-layout>
