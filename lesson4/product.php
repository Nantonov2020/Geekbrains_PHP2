<?php

require_once 'vendor/autoload.php';
$id = (int)$_GET['id'];
// подключение к бд
try {
    $dbh = new PDO('mysql:dbname=shop_gb_less3;host=localhost', 'root', '');
  } catch (PDOException $e) {
    echo "Error: Could not connect. " . $e->getMessage();
  }

  // установка error режима
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    // формируем SELECT запрос
    // в результате каждая строка таблицы будет объектом
    $sql = "SELECT * FROM category WHERE status=1 ORDER BY sort_order";
    $sth = $dbh->query($sql);
    while ($row = $sth->fetchObject()) {
      $data[] = $row;
    }

    $sql = "SELECT * FROM product WHERE id=$id";

    $sth = $dbh->query($sql);
    while ($row2 = $sth->fetchObject()) {
      $product[] = $row2;
    }
   
    // закрываем соединение
    unset($dbh); 

$loader = new \Twig\Loader\FilesystemLoader('templates');

$twig = new \Twig\Environment($loader);

$content = $twig->render('product-details.html',['data' => $data, 'product' => $product]);
echo $content;

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}
