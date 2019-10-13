<?php
include_once('Calculator.php');

if (isset($_POST['submit'])) {
    $companyId = (int)$_POST['shippingCompanyId'];
    $length = (float)$_POST['length'];
    $width = (float)$_POST['width'];
    $height = (float)$_POST['height'];
    $weight = (float)$_POST['weight'];

    $calculator = new Calculator($companyId, $length, $width, $height, $weight);
    $calculator->calculate();
    $name = $calculator->getCompanyName();
    $fee = $calculator->getCharge();

    $parameters = 'name=' . $name . '&fee=' . $fee . '&length=' . $length . '&width=' . $width . '&height=' . $height . '&weight=' . $weight;
    header('Location: /ShippingFee/View.php' . '?' . $parameters);
}



