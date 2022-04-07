<?php

namespace multidialogo\phpbollettini;

class Example
{
    public static function printGreetings(?string $text): void
    {
        echo $text ?: 'hello';
    }
}