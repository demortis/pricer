<?php


namespace Pmrt\helpers;


class Price
{
    public static function clean($string): int
    {
        return (int)preg_replace('/[^0-9]/', '', $string);
    }
}