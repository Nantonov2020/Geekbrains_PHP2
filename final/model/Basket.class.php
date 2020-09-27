<?php

class Basket
{
    private $idUser;
    private $session;
    private $idProduct;

    function __construct()
    {
        $this->idUser = 0;
        session_start();
        $this->session = session_id();
    }

    public function setUserId($userId)
    {
        $this->idUser = $userId;
    }

    public function getPositionBasket()
    {
        $sess = $this->session;
        return db::getInstance()->Select(
            "SELECT product.id as id, name,code,price,image,count(1) as count FROM baskets JOIN product ON (product.id = id_product) WHERE (session='$sess') GROUP BY id_product",
            ['sess' => $sess]);
    }

    public function getSummPositionBasket()
    {
        $sess = $this->session;
        return db::getInstance()->Select(
            "SELECT sum(price) as summ FROM baskets INER JOIN product ON (product.id = id_product) WHERE (session='$sess')",
            ['sess' => $sess]);
    }

    public function deleteFromBasket($idProduct, $count)
    {
        $idProduct = (int)$idProduct;
        $count = (int)$count;
        $sess = $this->session;
        $textQuery = "DELETE FROM baskets WHERE ((session='$sess')AND(id_product=$idProduct))";
        if ($count == 1) {
            $textQuery .= " LIMIT 1";
        }
        db::getInstance()->Query(
            $textQuery,
            ['sess' => $sess, 'idProduct' => $idProduct]);
    }

    public function addToBasket($idProduct, $count)
    {
        $idProduct = (int)$idProduct;
        $count = (int)$count;
        $sess = $this->session;

        $textQuery = "INSERT INTO baskets (session, id_product) VALUES ('$sess', $idProduct)";

        if ($count > 1) {
            for ($i = 2; $i <= $count; $i++)    {
                $textQuery .= ",('$sess', $idProduct)";
            }
        }

        db::getInstance()->Query(
            $textQuery,
            ['sess' => $sess, 'idProduct' => $idProduct]);

        $result = db::getInstance()->Select(
            "SELECT count(*) as count FROM baskets WHERE session='$sess'",
            ['sess' => $sess]);    
        return $result[0]['count'];
    }

}