<?php

include_once('Product.php');

class PostOffice
{
    protected $companyName = "郵局";
    protected $charge = 0;
    protected $shipProduct;

    public function __construct(Product $product)
    {
        $this->shipProduct = $product;
    }

    public function calculate()
    {
        $this->companyName = "郵局";
        $weight = $this->shipProduct->weight;
        $feeByWeight = 80 + $weight * 10;
        $length = $this->shipProduct->length;
        $width = $this->shipProduct->width;
        $height = $this->shipProduct->height;
        $size = $length * $width * $height;
        $feeBySize = $size * 0.0000353 * 1100;

        if ($feeByWeight < $feeBySize) {
            $this->charge = $feeByWeight;
        } else {
            $this->charge = $feeBySize;
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
