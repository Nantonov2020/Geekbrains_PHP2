<?php
$id = (int)$_POST['id'];

// подключение к бд
try {
    $dbh = new PDO('mysql:dbname=shop_gb_less3;host=localhost', 'root', '');
  } catch (PDOException $e) {
    echo "Error: Could not connect. " . $e->getMessage();
  }

    // установка error режима
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // формируем SELECT запрос
    // в результате каждая строка таблицы будет объектом
    $sql = "SELECT id,name,price,image,is_new FROM product WHERE status=1 LIMIT $id,6";
    $sth = $dbh->query($sql);
    while ($row2 = $sth->fetchObject()) {
      $dataProducts[] = $row2;
    }
    echo(json_encode($dataProducts));

?>