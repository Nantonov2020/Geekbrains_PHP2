<?php
namespace antonov;

class UnitProduct extends Product
{
    public function calculatePrice($price)
    {
        $this->setPrice($price);
    }

    public function calculateProfit()
    {
        $profit = $this->getPrice();
        $this->setProfit($profit);
    }
}