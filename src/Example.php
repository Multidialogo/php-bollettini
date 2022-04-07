<?php

namespace mulidialogo\phpbollettini;

class Example
{
    public static function printGreetings(?string $text): void
    {
        echo $text ?: 'hello';
    }
}