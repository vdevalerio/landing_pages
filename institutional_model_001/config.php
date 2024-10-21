<?php
// config.php

// Include your environment settings
include 'helpers.php';
include 'env.php';

$fromEnv = [
    'lang' => $lang,
    'companyName' => $companyName,
    'texts' => $texts,
    'cardSlider' => $cardSlider,
    'buttons' => $buttons,
    'nav' => $nav,
    'logos' => $logos,
    'footerCopy' => $footerCopy,
];

file_put_contents('config.json', json_encode($fromEnv));
