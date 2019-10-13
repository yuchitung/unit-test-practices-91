<?php

include_once('LogisticsInterface.php');
include_once('Product.php');

class BlackCat implements LogisticsInterface
{
    protected $companyName = "黑貓";
    protected $charge = 0;
    protected $shipProduct;

    public function __construct(Product $product)
    {
        $this->shipProduct = $product;
    }

    public function calculate()
    {
        $weight = $this->shipProduct->weight;
        if ($weight > 20) {
            $this->charge = 500;
        } else {
            $this->charge = 100 + $weight * 10;
        }
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
        return $this->companyName;
    }

    public function getCharge()
    {
        return $this->charge;
    }
}
