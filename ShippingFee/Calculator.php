<?php
include_once('BlackCat.php');
include_once('Hsinchu.php');
include_once('PostOffice.php');

/**
 * Class Calculator
 * 重構第五式：給你錢，趕快做
 * 不是自己職責以外的部分，就只出一張嘴，叫其他物件做事
 * ref: https://ithelp.ithome.com.tw/articles/10106006
 */
class Calculator
{
    protected $product;
    protected $dropCompanyId = 0;
    protected $companyName = '';
    protected $charge = 0;
    protected $length = 0;
    protected $width = 0;
    protected $height = 0;
    protected $weight = 0;

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

            /*
            $this->companyName = "黑貓";
            $weight = $this->weight;
            if ($this->weight > 20) {
                $this->charge = 500;
            } else {
                $fee = 100 + $weight * 10;
                $this->charge = $fee;
            }
            */

            //選新竹貨運，計算出運費，呈現物流商名稱與運費
        } else if ($this->dropCompanyId === 2) {
            $hsinchu = new Hsinchu($this->product);
            $hsinchu->calculate();
            $this->companyName = $hsinchu->getCompanyName();
            $this->charge = $hsinchu->getCharge();

            /*
            $this->companyName = "新竹貨運";
            $length = $this->length;
            $width = $this->width;
            $height = $this->height;
            $size = $length * $width * $height;

            //長 x 寬 x 高（公分）x 0.0000353
            if ($length > 100 || $width > 100 || $height > 100) {
                $this->charge = $size * 0.0000353 * 1100 + 500;
            } else {
                $this->charge = $size * 0.0000353 * 1200;
            }
            */

            //選郵局，計算出運費，呈現物流商名稱與運費
        } else if ($this->dropCompanyId === 3) {
            $postOffice = new PostOffice($this->product);
            $postOffice->Calculate();
            $this->companyName = $postOffice->getCompanyName();
            $this->charge = $postOffice->getCharge();

            /*
            $this->companyName = "郵局";
            $weight = $this->weight;
            $feeByWeight = 80 + $weight * 10;
            $length = $this->length;
            $width = $this->width;
            $height = $this->height;
            $size = $length * $width * $height;
            $feeBySize = $size * 0.0000353 * 1100;

            if ($feeByWeight < $feeBySize) {
                $this->charge = $feeByWeight;
            } else {
                $this->charge = $feeBySize;
            }
            */
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
