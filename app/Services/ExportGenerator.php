<?php

namespace App\Services;

use App\DTO\SongDto;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use function Spatie\LaravelPdf\Support\pdf;

class ExportGenerator
{
    public function generatePdf(SongDto $song, ?string $fileName = null): string
    {
        $pathToPdf = storage_path($fileName);

        pdf()
            ->view('songs.formats.pdf', compact('song'))
            ->name('song-' . uniqid())
            ->save($pathToPdf);

        return $pathToPdf;
    }

    public function generateDocx(SongDto $song, ?string $fileName = null): string
    {
        $phpWord = new PhpWord;
        $section = $phpWord->addSection();

        $section->addText(
            $song->title,
            ['name' => 'Tahoma', 'bold' => true, 'size' => 50]
        );

        foreach ($song->quatrains as $quatrain) {
            $texts = explode("\n", strip_tags($this->insertNewLinesAfterOuterTags($quatrain['body'])));

            foreach ($texts as $text) {
                $section->addText(
                    $text,
                    ['name' => 'Tahoma', 'size' => 14],
                );
            }
        }

        $writer = IOFactory::createWriter($phpWord);
        $docxName = $fileName ?? uniqid() . '.docx';
        $pathToDocx = storage_path($docxName);

        $writer->save($pathToDocx);

        return $pathToDocx;
    }

    private function insertNewLinesAfterOuterTags(string $html): string
    {
        $pattern = '/<\/[^>]+>\s*/';

        $result = preg_replace($pattern, "$0\n", $html);

        return $result;
    }
}
