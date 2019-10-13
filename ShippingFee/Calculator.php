<?php

/**
 * Class Calculator
 * 計算運費
 * 重構第二式：說人話
 * ref: https://ithelp.ithome.com.tw/articles/10105320
 */
class  Calculator
{
    protected $dropCompanyId = 0;
    protected $companyName = '';
    protected $charge = 0;
    protected $length = 0;
    protected $width = 0;
    protected $height = 0;
    protected $weight = 0;

    public function __construct(int $companyId, float $length, float $width, float $height, float $weight)
    {
        $this->dropCompanyId = $companyId;
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->weight = $weight;
    }

    public function calculate()
    {
        //選黑貓，計算出運費，呈現物流商名稱與運費
        if ($this->dropCompanyId === 1) {
            $this->companyName = "黑貓";
            $weight = $this->weight;
            if ($this->weight > 20) {
                $this->charge = 500;
            } else {
                $fee = 100 + $weight * 10;
                $this->charge = $fee;
            }

            //選新竹貨運，計算出運費，呈現物流商名稱與運費
        } else if ($this->dropCompanyId === 2) {
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

            //選郵局，計算出運費，呈現物流商名稱與運費
        } else if ($this->dropCompanyId === 3) {
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