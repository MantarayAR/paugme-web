<?php

namespace App\Helpers;

class FileHelper
{
    public static function humanFilesize($bytes, $decimals = 2)
    {
        $size = ['B, kB', 'MB', 'GB', 'TB', 'PB'];

        $factor = floor((strlen($bytes) - 1) / 3);

        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }

    public static function isImage($mimeType)
    {
        return starts_with($mimeType, 'image/');
    }
}