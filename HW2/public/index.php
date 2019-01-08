<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../services/Autoloader.php';
use \app\services\Autoloader;
use \app\services\Db;
use \app\models\Product;

spl_autoload_register([new Autoloader(), 'loadClass']);

$db = new Db;
$product = new Product($db);

var_dump($product);