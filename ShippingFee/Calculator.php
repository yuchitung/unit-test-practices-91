<?php
include_once('BlackCat.php');
include_once('Hsinchu.php');
include_once('PostOffice.php');
include_once ('Product.php');

/**
 * Class Calculator
 * 重構第八式：介面導向
 * 用該物件的角度去看世界，除了物件自己本身以外，看出去外面的世界，都是介面
 * ref: https://ithelp.ithome.com.tw/articles/10107028
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
        //選黑貓，計算出運費，呈現物流商名稱與運費
        if ($this->dropCompanyId === 1) {
            /*
            $blackCat = new BlackCat($this->product);
            $blackCat->calculate();
            $this->companyName = $blackCat->getCompanyName();
            $this->charge = $blackCat->getCharge();
            */

            $logistics = new BlackCat($this->product);
            $logistics->calculate();
            $this->companyName = $logistics->getCompanyName();
            $this->charge = $logistics->getCharge();

            //選新竹貨運，計算出運費，呈現物流商名稱與運費
        } else if ($this->dropCompanyId === 2) {
            /*
            $hsinchu = new Hsinchu($this->product);
            $hsinchu->calculate();
            $this->companyName = $hsinchu->getCompanyName();
            $this->charge = $hsinchu->getCharge();
            */

            $logistics = new Hsinchu($this->product);
            $logistics->calculate();
            $this->companyName = $logistics->getCompanyName();
            $this->charge = $logistics->getCharge();

            //選郵局，計算出運費，呈現物流商名稱與運費
        } else if ($this->dropCompanyId === 3) {
            /*
            $postOffice = new PostOffice($this->product);
            $postOffice->Calculate();
            $this->companyName = $postOffice->getCompanyName();
            $this->charge = $postOffice->getCharge();
            */

            $logistics = new PostOffice($this->product);
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
