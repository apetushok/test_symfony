<?php


namespace App\Service\GeometryCalculator;


use App\Service\GeometryCalculator\Interfaces\GeometryCalculatorInterface;

class TriangleCalculator implements GeometryCalculatorInterface
{
    private float $a;
    private float $b;
    private float $c;

    public function __construct($params)
    {
        list($this->a, $this->b, $this->c) = $params;

        if(empty($this->a) || empty($this->b) || empty($this->c)){
            throw new \Exception('Invalid parameters');
        }

        if(!$this->validateTrianglePartsRatioAspect()){
            throw new \Exception('Incorrect Triangle Parts Ratio Aspect');
        }
    }

    private function validateTrianglePartsRatioAspect()
    {
        return $this->a + $this->b > $this->c
            && $this->a + $this->c > $this->b
            && $this->b + $this->c > $this->a;
    }

    public function getSurface():float
    {
        $p = ($this->getCircumference())/2;
        return sqrt(abs($p * ($p - $this->a) * ($p - $this->b) * ($p - $this->c)));
    }

    public function getCircumference():float
    {
        return $this->a + $this->b + $this->c;
    }

    public function getParams():array
    {
        return [
            'a' => $this->a,
            'b' => $this->b,
            'c' => $this->c
        ];
    }
}