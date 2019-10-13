<?php
include_once ('BlackCat.php');
include_once ('Hsinchu.php');
include_once ('PostOffice.php');
include_once('Product.php');

/**
 * Class Calculator
 * 重構第九式：運用Design Pattern-策略模式
 * ref: https://ithelp.ithome.com.tw/articles/10107271
 */
class Calculator
{
    protected $product;
    protected $dropCompanyId = 0;
    protected $companyName = '';
    protected $charge = 0;

    public function __construct(int $companyId, Product $product)
    {
        $this->dropCompanyId = $companyId;
        $this->product = $product;
    }

    protected function calculate()
    {
        $logistics = $this->getILogistics($this->dropCompanyId, $this->product);
        if ($logistics !== null) {
            $logistics->calculate();
            $this->companyName = $logistics->getCompanyName();
            $this->charge = $logistics->getCharge();
        }
    }

    private function getILogistics(int $companyId, Product $product)
    {
        if ($companyId === 1) {
            return new BlackCat($product);
        } else if ($companyId === 2) {
            return new Hsinchu($product);
        } else if ($companyId === 3) {
            return new PostOffice($product);
        } else {
            return null;
        }
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
