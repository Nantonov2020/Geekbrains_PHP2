<?php
namespace antonov;
abstract class Product
{
    private $name;
    private $price;
    private $profit;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
        $this->profit = 0;
    }

    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getProfit(){
        return $this->profit;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function setProfit($profit){
        $this->profit = $profit;
    }

    abstract public function calculatePrice($price);

   abstract public function calculateProfit();

    public function __toString(){
        return "name:".$this->name."<br> price:".$this->price."<br>profit:".$this->profit."<br>================================<br>";
    }
}

