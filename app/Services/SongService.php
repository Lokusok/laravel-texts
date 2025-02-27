<?php

namespace App\Services;

use App\DTO\SongDto;
use App\Models\Song;
use Illuminate\Support\Facades\DB;

class SongService
{
    public function create(SongDto $songDto)
    {
        DB::transaction(function () use ($songDto) {
            $song = Song::create([
                'title' => $songDto->title,
            ]);

            foreach ($songDto->quatrains as $quatrain) {
                $song->quatrains()->create([
                    'body' => $quatrain['body'],
                    'order' => $quatrain['order'],
                ]);
            }
        });
    }

    public function update(Song $song, SongDto $songDto)
    {
        DB::transaction(function () use ($song, $songDto) {
            $song->update([
                'title' => $songDto->title,
            ]);

            foreach ($songDto->quatrains as $idx => $quatrain) {
                $song->quatrains[$idx]->update($quatrain);
            }
        });
    }
}
