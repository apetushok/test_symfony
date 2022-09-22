<?php


namespace App\Enums;


enum GeometricFigures
{
    case CIRCLE;
    case TRIANGLE;


    public function getName(): string
    {
        return match($this)
        {
            self::CIRCLE => 'circle',
            self::TRIANGLE => 'triangle'
        };
    }
}