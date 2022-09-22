<?php


namespace App\Service\GeometryCalculator\Interfaces;

use App\Enums\GeometricFigures;

interface GeometryCalculatorFactoryInterface
{
    public function createGeometryCalculator(GeometricFigures $figure, array $params):GeometryCalculatorInterface;
}