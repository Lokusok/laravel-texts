@if ($paginator->hasPages())
    <div class="flex justify-center gap-x-[10px]">
        @foreach ($elements[0] as $page => $link)
            <div>
                <a class="px-3 py-2 rounded-lg shadow-md cursor-pointer active:opacity-60 hover:bg-gray-100" href="{{ $link }}">{{ $page }}</a>
            </div>
        @endforeach
    </div>
@endif
