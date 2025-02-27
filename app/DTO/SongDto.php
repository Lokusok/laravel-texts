<?php

namespace App\DTO;

use Illuminate\Http\Request;

class SongDto
{
    public function __construct(
        public readonly string $title,
        public readonly array $quatrains,
    ) {}

    public static function fromRequest(Request $request): static
    {
        $title = $request->input('title');
        $quatrains = [];

        for ($i = 1; $i <= 3; $i++) {
            $quatrains[] = [
                'body' => $request->input("quatrain_{$i}"),
                'order' => $request->input("order_{$i}"),
            ];
        }

        $song = new static($title, $quatrains);

        return $song;
    }
}
