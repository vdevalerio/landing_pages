<?php
header("Content-Type: text/css");
require_once 'env.php';

$rootValues = [
    '--primary-color' => $cssVariables['colorPalette']['primary'],
    '--secondary-color' => $cssVariables['colorPalette']['secondary'],
    '--tertiary-color' => $cssVariables['colorPalette']['tertiary'],
    '--quarternary-color' => $cssVariables['colorPalette']['quarternary'],
    '--quinarius-color' => $cssVariables['colorPalette']['quinarius'],
    '--text-color' => $cssVariables['colorPalette']['mainText'],
    '--observation-color' => $cssVariables['colorPalette']['subText'],
    '--font-family' => $cssVariables['text']['fontFamily'],
    '--default-blocks-padding' => '20px 200px',
];

echo ":root {\n";
foreach ($rootValues as $key => $value) {
    echo "    $key: $value;\n";
}
echo "}\n";
?>