<?php


namespace App\Service\GeometryCalculator;


use App\Service\GeometryCalculator\Interfaces\GeometryCalculatorInterface;

class CircleCalculator implements GeometryCalculatorInterface
{
    private float $pi = 3.14;
    private float $radius;

    public function __construct($params)
    {
        list($this->radius) = $params;

        if(empty($this->radius)){
            throw new \Exception('Invalid parameters');
        }
    }

    public function getSurface():float
    {
        return $this->pi * pow($this->radius, 2);
    }

    public function getCircumference():float
    {
        return 2 * $this->pi * $this->radius;
    }

    public function getParams():array
    {
        return ['radius' => $this->radius];
    }
}