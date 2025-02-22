<?php

use Morilog\Jalali\Jalalian;

function pDate($date)
{
    $date = Jalalian::fromDateTime($date);
    return persian($date->format('Y/m/d H:i:s'));
}


function convertPersianToEnglish(string $number): string
{
    $number = str_replace('۰', '0', $number);
    $number = str_replace('۱', '1', $number);
    $number = str_replace('۲', '2', $number);
    $number = str_replace('۳', '3', $number);
    $number = str_replace('۴', '4', $number);
    $number = str_replace('۵', '5', $number);
    $number = str_replace('۶', '6', $number);
    $number = str_replace('۷', '7', $number);
    $number = str_replace('۸', '8', $number);
    $number = str_replace('۹', '9', $number);

    return $number;
}
function convertArabicToEnglish($number)
{
    $number = str_replace('٠', '0', $number);
    $number = str_replace('١', '1', $number);
    $number = str_replace('٢', '2', $number);
    $number = str_replace('٣', '3', $number);
    $number = str_replace('٤', '4', $number);
    $number = str_replace('٥', '5', $number);
    $number = str_replace('٦', '6', $number);
    $number = str_replace('٧', '7', $number);
    $number = str_replace('٨', '8', $number);
    $number = str_replace('٩', '9', $number);

    return $number;
}

function convertEnglishToPersian($number)
{
    $number = str_replace('0', '۰', $number);
    $number = str_replace('1', '۱', $number);
    $number = str_replace('2', '۲', $number);
    $number = str_replace('3', '۳', $number);
    $number = str_replace('4', '۴', $number);
    $number = str_replace('5', '۵', $number);
    $number = str_replace('6', '۶', $number);
    $number = str_replace('7', '۷', $number);
    $number = str_replace('8', '۸', $number);
    $number = str_replace('9', '۹', $number);

    return $number;
}
function persian($text)
{
    $text = convertArabicToEnglish($text);
    $text = convertEnglishToPersian($text);

    return $text;
}

function english($text)
{
    $text = convertPersianToEnglish($text);
    $text = convertArabicToEnglish($text);
    return $text;
}

