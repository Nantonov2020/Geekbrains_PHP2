<?php

require_once 'Product.php';
require_once 'DigitalProduct.php';
require_once 'UnitProduct.php';
require_once 'WeightProduct.php';

$soft = new antonov\DigitalProduct('Office',1234);
$soft->calculatePrice(222);
$soft->calculateProfit();
echo($soft);

$auto = new antonov\UnitProduct('BMW',10000);
$auto->calculateProfit();
echo($auto);

$food = new antonov\WeightProduct('sugar', 5.4, 2.3);
$food->calculateProfit();
echo($food);