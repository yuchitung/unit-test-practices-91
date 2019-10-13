<?php

include_once('LogisticsInterface.php');
include_once('Product.php');

class Hsinchu implements LogisticsInterface
{
    protected $companyName = "新竹貨運";
    protected $charge = 0;
    protected $shipProduct;

    public function __construct(Product $product)
    {
        $this->shipProduct = $product;
    }

    public function calculate()
    {
        $length = $this->shipProduct->length;
        $width = $this->shipProduct->width;
        $height = $this->shipProduct->height;
        $size = $length * $width * $height;

        //長 x 寬 x 高（公分）x 0.0000353
        if ($length > 100 || $width > 100 || $height > 100) {
            $this->charge = $size * 0.0000353 * 1100 + 500;
        } else {
            $this->charge = $size * 0.0000353 * 1200;
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
