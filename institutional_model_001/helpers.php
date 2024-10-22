<?php

function getImagesFromDir($dir) {
    $resizedDir = $dir . '/resized/';
    $files = scandir($dir);
    $files = filterFiles($files);

    if (!is_dir($resizedDir)) {
        if (!mkdir($resizedDir, 0777, true)) {
            die("Failed to create resized directory: $resizedDir");
        }
    }

    $maxHeight = getMaxHeightOfFilesFromDir($dir);

    resizeImages($files, $dir, $resizedDir, $maxHeight);
    $resizeImages = getFilesFromDir($resizedDir);

    list($minResizedWidth, $minResizedHeight) = getMinDimensions($resizeImages, $resizedDir);

    cropImagesCentrally($resizeImages, $resizedDir, $resizedDir, $minResizedWidth, $minResizedHeight);

    $images = [];
    $croppedFiles = getFilesFromDir($resizedDir);

    foreach ($croppedFiles as $file) {
        $filePath = $resizedDir . '/' . $file;

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

    return $images;
}

function filterFiles($files) {
    $filteredFiles = [];

    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..' && $file !== 'resized'&& $file !== 'backup') {
            $filteredFiles[] = $file;
        }
    }

    return $filteredFiles;
}

function getFilesFromDir($dir) {
    $files = [];

    if (!is_dir($dir)) {
        return $files;
    }

    if ($handle = opendir($dir)) {
        while (false !== ($file = readdir($handle))) {
            if ($file !== '.' && $file !== '..') {
                $filePath = $dir . '/' . $file;

                if (is_file($filePath)) {
                    $files[] = $file;
                }
            }
        }
        closedir($handle);
    }

    return $files;
}

function getMaxHeightOfFilesFromDir($dir) {
    $maxHeight = 0;
    $files = getFilesFromDir($dir);

    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $filePath = $dir . '/' . $file;

            $imageSize = getimagesize($filePath);
            if ($imageSize && $imageSize[1] > $maxHeight) {
                $maxHeight = $imageSize[1];
            }
        }
    }

    return $maxHeight;
}

function getMinDimensions($files, $dir) {
    $minHeight = PHP_INT_MAX;
    $minWidth = PHP_INT_MAX;
    foreach ($files as $file) {
        $filePath = $dir . '/' . $file;
        $imageSize = getimagesize($filePath);
        if ($imageSize) {
            if ($imageSize[1] < $minHeight) {
                $minHeight = $imageSize[1];
            }
            if ($imageSize[0] < $minWidth) {
                $minWidth = $imageSize[0];
            }
        }
    }

    return [$minWidth, $minHeight];
}

function removeIncorrectSRGBProfile($filePath) {
    $image = imagecreatefrompng($filePath);
    if (!$image) {
        return false;
    }

    return $image;
}

function resizeImage($filePath, $newWidth, $newHeight) {
    $imageType = exif_imagetype($filePath);
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            $srcImage = imagecreatefromjpeg($filePath);
            break;
        case IMAGETYPE_PNG:
            $srcImage = removeIncorrectSRGBProfile($filePath);
            break;
        case IMAGETYPE_GIF:
            $srcImage = imagecreatefromgif($filePath);
            break;
        default:
            return false;
    }

    $newImage = imagecreatetruecolor($newWidth, $newHeight);

    imagecopyresampled($newImage, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($srcImage), imagesy($srcImage));

    return $newImage;
}

function resizeImages($files, $sourceDir, $destinyDir, $maxHeight) {
    foreach ($files as $file) {
        $sourcePath = $sourceDir . '/' . $file;
        $destinyPath = $destinyDir . '/' . $file;

        $imageSize = getimagesize($sourcePath);
        if ($imageSize) {
            list($width, $height) = $imageSize;
            $newWidth = ($width / $height) * $maxHeight;
            $resizedImage = resizeImage($sourcePath, $newWidth, $maxHeight);
            saveImage($resizedImage, $sourcePath, $destinyPath);
        }
    }
}

function cropImage($filePath, $cropWidth, $cropHeight, $cropX, $cropY) {
    $imageType = exif_imagetype($filePath);
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            $srcImage = imagecreatefromjpeg($filePath);
            break;
        case IMAGETYPE_PNG:
            $srcImage = removeIncorrectSRGBProfile($filePath);
            break;
        case IMAGETYPE_GIF:
            $srcImage = imagecreatefromgif($filePath);
            break;
        default:
            return false;
    }

    $croppedImage = imagecrop($srcImage, [
        'x' => $cropX,
        'y' => $cropY,
        'width' => $cropWidth,
        'height' => $cropHeight
    ]);

    return $croppedImage;
}

function cropImagesCentrally($files, $sourceDir, $destinyDir, $minWidth, $minHeight) {
    foreach ($files as $file) {
        $sourcePath = $sourceDir . '/' . $file;
        $destinyPath = $destinyDir . '/' . $file;

        $imageSize = getimagesize($sourcePath);
        if ($imageSize) {
            list($width, $height) = $imageSize;

            $cropX = ($width - $minWidth) / 2;
            $cropY = ($height - $minHeight) / 2;

            $croppedImage = cropImage($sourcePath, $minWidth, $minHeight, $cropX, $cropY);
            saveImage($croppedImage, $sourcePath, $destinyPath);
        }
    }
}

function saveImage($image, $sourcePath, $destinyPath) {
    $imageType = exif_imagetype($sourcePath);

    switch ($imageType) {
        case IMAGETYPE_JPEG:
            imagejpeg($image, $destinyPath, 90);
            break;
        case IMAGETYPE_PNG:
            imagepng($image, $destinyPath);
            break;
        case IMAGETYPE_GIF:
            imagegif($image, $destinyPath);
            break;
    }

    imagedestroy($image);
}