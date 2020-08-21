<?php

class Product
{
    private $name;
    private $manufacturer;
    private $price;
    private $status;// 0 - в пути от поставщика, 1 - на складе, 2 - на витрине, 3 - продан, 4 - в ремонте.
    private $weight;// масса в кг.

    function __construct($name, $manufacturer, $price, $status, $weight)
    {
        $this->name = $name;
        $this->manufacturer = $manufacturer;
        $this->price = $price;
        $this->status = $status;
        $this->weight = $weight;
    }

    /**
     * Метод изменения статуса товара.
     */
    function changeStatus($status)
    {
        if (($status<5) && ($status>=0)) $this->status = $status;
    }

    /**
     * Метод применяет скидку к текущей цене товара.
     * discount - процент на который применяется скидка.
     */
    function discount($discount)
    {
        $this->price = ($this->price)*((100-$discount)/100);
    }

}

class Phone extends Product
{
    private $diagonal;
    private $marka;
    private $capacityOfBattery;
    private $countOfCamera;

    function __construct($name, $manufacturer, $price, $status, $diagonal, $marka, $capacityOfBattery, $countOfCamera, $weight)
    {
        parent::__construct($name, $manufacturer, $price, $status, $weight);

        $this->diagonal = $diagonal;
        $this->marka = $marka;
        $this->capacityOfBattery = $capacityOfBattery;
        $this->countOfCamera = $countOfCamera;
    }

}

$ph = new Phone('Phone', 'USA', 1350, 0, 5.5, 's6', 200, 4, 0.08);

echo("<pre>");
print_r($ph);
echo("</pre>");
echo("<br>==================================<br>");

$ph->discount(10);
echo("<pre>");
print_r($ph);
echo("</pre>");
echo("<br>==================================<br>");

$ph->changeStatus(1);
echo("<pre>");
print_r($ph);
echo("</pre>");
echo("<br>==================================<br>");