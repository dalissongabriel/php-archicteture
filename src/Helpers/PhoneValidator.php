<?php


namespace Alura\Architecture\Helpers;

trait PhoneValidator
{
    public static function isValid(string $phone): bool
    {
        $regex_phone = "/\([0-9]{2}\) [0-9]{8,9}/";
        return preg_match($regex_phone, $phone);
    }
}