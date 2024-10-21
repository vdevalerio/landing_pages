<?php

function getImagesFromDir($dir) {
    $images = [];
    $files = scandir($dir);

    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $filePath = $dir . '/' . $file;

            $fileName = pathinfo($file, PATHINFO_FILENAME);

            if (strpos($fileName, '-') !== false) {
                list($prefix, $trimmedName) = explode('-', $fileName, 2);
            } else {
                $prefix = $fileName;
                $trimmedName = $fileName;
            }

            $title = ucwords(str_replace(['-', '_'], ' ', $trimmedName));

            $images[$prefix] = [
                'title' => $title,
                'path' => $filePath,
            ];
        }
    }

    return $images;
}