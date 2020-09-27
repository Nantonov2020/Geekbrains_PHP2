<?php

class BasketController extends Controller
{
    public $view = 'basket';
    public $title;

    function __construct()
    {
        parent::__construct();
        $this->title .= ' | КОРЗИНА';
    }

	function index($data){
        $basket = new Basket();
        $output = [];
        $output['PositionBasket'] = $basket->getPositionBasket();

        if (count($output['PositionBasket']) == 0) {
            $output['Count'] = 0;
        } else {
            $output['Count'] = 1;
        }

        $output['Summ'] = $basket->getSummPositionBasket()[0]['summ'];
        return $output;
   }

   function add($data){
        $_GET['asAjax'] = true;
        $this->title = "";
        $idProducts = (int)$_POST['id'];
        $count = (int)$_POST['count'];
        $basket = new Basket();
        return $basket->addToBasket($idProducts, $count);
    }

    function addPositionToBasket($data){
        $_GET['asAjax'] = true;
        $this->title = "";
        $idProducts = (int)$_POST['id'];
        $basket = new Basket();
        $basket->addToBasket($idProducts, 1);
        $output['PositionBasket'] = $basket->getPositionBasket();

        return $output;
    }
    function deletePositionFromBasket($data)
    {
        $_GET['asAjax'] = true;
        $this->title = "";
        $idProducts = (int)$_POST['id'];
        $count = (int)$_POST['count'];
        $basket = new Basket();
        $basket->deleteFromBasket($idProducts, $count);
        $output['PositionBasket'] = $basket->getPositionBasket();

        return $output;
    }

}