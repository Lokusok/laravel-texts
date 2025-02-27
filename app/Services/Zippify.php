<?php

namespace App\Services;

class Zippify
{
    public function handle(string $fullPath, string $insideName): string
    {
        $zip = new \ZipArchive;
        $pathZip = storage_path(uniqid() . '.zip');

        $zip->open($pathZip, \ZipArchive::CREATE);
        $zip->addFile($fullPath, $insideName);
        $zip->close();

        return $pathZip;
    }
}
