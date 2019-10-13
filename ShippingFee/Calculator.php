<?php
include_once('Product.php');
include_once ('FactoryRepository.php');

/**
 * Class Calculator
 * 重構第十式：運用Design Pattern-工廠模式
 * ref: https://ithelp.ithome.com.tw/articles/10107516
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

    public function calculate()
    {
        $logistics = FactoryRepository::getLogistics($this->dropCompanyId, $this->product);
        if ($logistics !== null) {
            $logistics->calculate();
            $this->companyName = $logistics->getCompanyName();
            $this->charge = $logistics->getCharge();
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
