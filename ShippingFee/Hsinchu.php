<?php

class Hsinchu
{
    protected $shipProduct;

    public function calculate()
    {
        throw new Exception('NotImplementedException.');
    }

    public function set($product)
    {
        $this->shipProduct = $product;
    }

    public function get()
    {
        return $this->shipProduct;
    }

    public function getCompanyName()
    {
        throw new Exception('NotImplementedException.');
    }

    public function getCharge()
    {
        throw new Exception('NotImplementedException.');
    }
}
