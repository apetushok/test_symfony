<?php


namespace App\Service;


use App\Enums\GeometricFigures;
use App\Service\GeometryCalculator\Interfaces\GeometryCalculatorFactoryInterface;
use App\Service\GeometryCalculator\Interfaces\GeometryCalculatorInterface;

class GeometryCalculatorFactory implements GeometryCalculatorFactoryInterface
{
    public function createGeometryCalculator(GeometricFigures $figure, array $params):GeometryCalculatorInterface
    {
        $figureClass = '\App\Service\GeometryCalculator\\'.ucfirst($figure->getName()).'Calculator';
        if(!class_exists($figureClass)){
            throw new \Exception('Geometric Figure class does not exist');
        }

        return new $figureClass($params);
    }
}