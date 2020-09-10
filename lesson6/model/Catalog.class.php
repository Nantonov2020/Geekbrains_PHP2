<?php
class Catalog{
     function Test(){
        return db::getInstance()->Select(
            'SELECT id_category, name FROM categories WHERE status=:status',
            ['status' => 1]);
    }

    function getPositionOfCatalog(){
        return db::getInstance()->Select(
            'SELECT id, name FROM category WHERE status=:status ORDER BY sort_order',
            ['status' => 1]);
    }

    function getLastProducts(){
        return db::getInstance()->Select(
            'SELECT id,name,price,image,is_new FROM product WHERE status=:status ORDER BY id DESC LIMIT 12',
            ['status' => 1]);
    }

    function getInfoAboutProduct($data){
        $data = (int)$data;
       // return $data;
        
         return db::getInstance()->Select(
            'SELECT id,name,price,image,is_new,description,code,brand FROM product WHERE id=:id LIMIT 1',
            ['id' => $data]);
            
    }
    
}