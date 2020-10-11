<?php


namespace Alura\Architecture\Helpers;


class EmailValidator
{
    public static function isValid($address): bool
    {
        if (filter_var($address, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
}