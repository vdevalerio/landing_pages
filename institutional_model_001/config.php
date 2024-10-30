<?php
// config.php

// Include your environment settings
include 'helpers.php';
include 'env.php';

$fromEnv = [
    // 'lang' => $lang,
    // 'companyName' => $companyName,
    // 'faviconPath' => $faviconPath,
    // 'nav' => $nav,
    // 'imageSlider' => $imageSlider,
    // 'textImage' => $textImage,
    'cardSlider' => $cardSlider,
    'contactUs' => $contactUs,
    // 'footerCopy' => $footerCopy,
];

file_put_contents('config.json', json_encode($fromEnv));
