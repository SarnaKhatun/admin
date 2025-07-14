<?php

if (!function_exists('convertNumberToBanglaWords')) {
    function convertNumberToBanglaWords($number)
    {
        $f = new \NumberFormatter('bn_BD', \NumberFormatter::SPELLOUT);
        return $f->format($number);
    }
}

