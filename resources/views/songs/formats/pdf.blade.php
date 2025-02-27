<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="p-[30px]">
        <div class="flex justify-between items-center gap-x-[30px] mb-[30px] border-b border-b-gray-700">
            <h1 class="font-bold text-[30px]">
                {{ $song->title }}
            </h1>
        </div>

        <div class="flex flex-col gap-y-[30px]">
            @foreach ($song->quatrains as $quatrain)
                <div>
                    <div>{{ $quatrain['body'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
