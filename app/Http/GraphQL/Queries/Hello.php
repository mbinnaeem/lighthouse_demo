<?php

namespace App\Http\GraphQL\Queries;

class Hello
{
    public static function resolve(): string
    {
        return 'world!';
    }
}