<?php
require_once 'Singleton.php';

$obj = Singleton::getObject();
$obj -> message();
