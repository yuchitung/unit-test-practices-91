<?php
include_once('Product.php');
include_once('BlackCat.php');
include_once('Hsinchu.php');
include_once('PostOffice.php');

class FactoryRepository
{
    public static function getLogistics(int $companyId, Product $product): LogisticsInterface
    {
        if ($companyId === 1) {
            return new BlackCat($product);
        } else if ($companyId == 2) {
            return new Hsinchu($product);
        } else if ($companyId === 3) {
            return new PostOffice($product);
        } else {
            return null;
        }
    }
}

