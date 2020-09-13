<?php

class CatalogController extends Controller
{
    public $view = 'catalog';
    public $title;

    function __construct()
    {
        parent::__construct();
        $this->title .= ' | КАТАЛОГ';
    }


	function index($data){
        $catalog = new Catalog();
        //return $catalog->Test();
        $output = [];
        $output['positionOfCatalog'] =  $catalog->getPositionOfCatalog();
        $output['lastProduct'] =  $catalog->getLastProducts();
        return $output;
   }

   function product($data){
        $catalog = new Catalog();
        $output = [];
        $output['positionOfCatalog'] =  $catalog->getPositionOfCatalog();
        $output['add'] =  $catalog->getInfoAboutProduct($data['id']);
        return $output;
}

}