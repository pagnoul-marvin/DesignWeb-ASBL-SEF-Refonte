<?php

namespace Validator;

class Validator
{
    public static function validateEmail($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function emailContainsAtSymbol(string $email): bool
    {
        return str_contains($email, '@');
    }

    public static function min(string $key, int $value): bool
    {
        if (mb_strlen($_REQUEST[$key]) < $value) {
            return false;
        }
        return true;
    }

    public static function max(string $key, int $value): bool
    {
        if (mb_strlen($_REQUEST[$key]) > $value) {
            return false;
        }
        return true;
    }

    public static function required(string $key): bool
    {
        return !empty($_REQUEST[$key]);
    }

    public static function no_numbers(string $key): bool
    {
        return !strpbrk($_REQUEST[$key], '0123456789');
    }
}
