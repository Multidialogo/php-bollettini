<?php

namespace multidialogo\phpbollettini\Example;

class Example
{
    public static function printGreetings(?string $text): void
    {
        echo $text ?: 'hello';
    }
}