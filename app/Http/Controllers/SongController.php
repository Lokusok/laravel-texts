<?php

namespace App\Http\Controllers;

use App\DTO\SongDto;
use App\Http\Requests\Songs\StoreSongRequest;
use App\Models\Song;
use App\Services\ExportGenerator;
use App\Services\SongService;
use App\Services\Zippify;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SongController extends Controller
{
    public function __construct(
        private ExportGenerator $exportGenerator,
        private Zippify $zippify,
        private SongService $songService,
    ) {}

    public function index()
    {
        $songs = Song::orderBy('id', 'DESC')->get(['id', 'title', 'created_at']);

        return view('songs.index', [
            'songs' => $songs,
        ]);
    }

    public function show(Song $song)
    {
        $song->load('quatrains');

        return view('songs.show', [
            'song' => $song,
        ]);
    }

    public function create()
    {
        return view('songs.create');
    }

    public function store(StoreSongRequest $request)
    {
        $songDto = SongDto::fromRequest($request);

        $this->songService->create($songDto);

        return redirect()->back()->with('success', 'Песня успешно создана');
    }

    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route('songs.index')->with('success', 'Текст успешно удалён');
    }

    public function pdf(Song $song)
    {
        $song->load('quatrains');

        $songDto = new SongDto(
            title: $song->title,
            quatrains: $song->quatrains->toArray(),
        );

        $pdfName = Str::uuid() . '.pdf';
        $pathToPdf = $this->exportGenerator->generatePdf($songDto, $pdfName);
        $pathZip = $this->zippify->handle($pathToPdf, $pdfName);

        return response()->download($pathZip);
    }

    public function docx(Song $song)
    {
        $song->load('quatrains');

        $songDto = new SongDto(
            title: $song->title,
            quatrains: $song->quatrains->toArray(),
        );

        $docxName = Str::uuid() . '.docx';
        $pathToDocx = $this->exportGenerator->generateDocx($songDto, $docxName);
        $pathZip = $this->zippify->handle($pathToDocx, $docxName);

        return response()->download($pathZip);
    }
}
