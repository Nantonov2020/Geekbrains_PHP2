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

        return 111;
   }

   function add($data){
    $_GET['asAjax'] = true;

    return 111;

}


}