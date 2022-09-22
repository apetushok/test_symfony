<?php


namespace App\Controller;

use App\Enums\GeometricFigures;
use App\Service\GeometryCalculator\Interfaces\GeometryCalculatorFactoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\GeometryCalculator\Interfaces\GeometryCalculatorInterface;

class GeometryController  extends AbstractController
{
    public function triangle(GeometryCalculatorFactoryInterface $geometryCalculatorFactory, float $a, float $b, float $c): JsonResponse
    {
        $figureType = GeometricFigures::TRIANGLE;
        $calculator = $geometryCalculatorFactory->createGeometryCalculator($figureType, [$a, $b, $c]);

        return new JsonResponse($this->getResponse($figureType, $calculator));
    }

    public function circle(GeometryCalculatorFactoryInterface $geometryCalculatorFactory, float $radius): JsonResponse
    {
        $figureType = GeometricFigures::CIRCLE;
        $calculator = $geometryCalculatorFactory->createGeometryCalculator($figureType, [$radius]);

        return new JsonResponse($this->getResponse($figureType, $calculator));
    }

    private function getResponse(GeometricFigures $figureType, GeometryCalculatorInterface $calculator):array
    {
        return [
            'type' => $figureType->getName(),
            ...$calculator->getParams(),
            'surface' => $calculator->getSurface(),
            'circumference' => $calculator->getCircumference()
        ];
    }
}