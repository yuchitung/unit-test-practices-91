<?php
include_once('BlackCat.php');
include_once('Hsinchu.php');
include_once('PostOffice.php');

/**
 * Class Calculator
 * 重構第七式：食神歸位
 * 填入功能，得到綠燈
 * ref: https://ithelp.ithome.com.tw/articles/10106692
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
            $blackCat = new BlackCat($this->product);
            $blackCat->calculate();
            $this->companyName = $blackCat->getCompanyName();
            $this->charge = $blackCat->getCharge();

            //選新竹貨運，計算出運費，呈現物流商名稱與運費
        } else if ($this->dropCompanyId === 2) {
            $hsinchu = new Hsinchu($this->product);
            $hsinchu->calculate();
            $this->companyName = $hsinchu->getCompanyName();
            $this->charge = $hsinchu->getCharge();

            //選郵局，計算出運費，呈現物流商名稱與運費
        } else if ($this->dropCompanyId === 3) {
            $postOffice = new PostOffice($this->product);
            $postOffice->Calculate();
            $this->companyName = $postOffice->getCompanyName();
            $this->charge = $postOffice->getCharge();
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
