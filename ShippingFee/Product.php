<?php

class Product
{
    public $length;
    public $width;
    public $height;
    public $weight;

    public function __construct(float $length, float $width, float $height, float $weight)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->weight = $weight;
    }
}