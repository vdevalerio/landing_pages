<?php
// config.php

// Include your environment settings
include 'env.php';

$fromEnv = [
    'lang' => $lang,
    'company_name' => $company_name,
    'texts' => $texts,
    'card_slider' => $card_slider,
    'buttons' => $buttons,
    'nav' => $nav,
    'logos' => $logos,
    'footer_copy' => $footer_copy,
];

file_put_contents('config.json', json_encode($fromEnv));
