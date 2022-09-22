<?php


namespace App\Service\GeometryCalculator\Interfaces;


interface GeometryCalculatorInterface
{
    public function getCircumference():float;
    public function getSurface():float;
    public function getParams():array;
}