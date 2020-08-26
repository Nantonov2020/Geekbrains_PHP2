<?php
namespace antonov;
class WeightProduct extends Product
{
    private $weight;

    public function __construct($name, $price, $weight)
    {
        parent::__construct($name, $price);
        $this->weight = $weight;
    }   

    public function getWeight(){
        return $this->weight;
    }

    public function setWeight($weight){
        $this->weight = $weight;
    }

    public function calculatePrice($price)
    {
        $this->setPrice($price);
    }

    public function calculateProfit()
    {
        $profit = $this->getPrice() * $this->getWeight();
        $this->setProfit($profit);
    }
}