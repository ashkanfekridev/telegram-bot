<?php
function dd($data)
{

    echo '<pre><code>';
    var_dump($data);
    echo '</code></pre>';
}

function env($config)
{
    return $_ENV[$config] ?? null;
}

function persianNumbersToEnglish($string)
{
    // Arrays of Persian and Arabic numerals
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];

    // English numerals (0-9)
    $num = range(0, 9);

    // Replace Persian numerals with English numerals
    $convertedPersianNums = str_replace($persian, $num, $string);

    // Replace Arabic numerals with English numerals
    $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

    return $englishNumbersOnly;
}