<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../services/Autoloader.php';
use \app\services\Autoloader;
use \app\services\Db;
use \app\models\Product;
use \app\models\DigitalProduct;
use \app\models\WeightProduct;

spl_autoload_register([new Autoloader(), 'loadClass']);

$db = new Db;
$product = new Product(1, 'товар', 'описание товара', 100, 3, $db);

$digitalProduct = new DigitalProduct(2, 'цифровой товар', 'описание товара', 100, 3, $db);

$weightProduct = new WeightProduct(3, 'весовой товар', 'описание товара', 100, 3, 2, $db);

var_dump($product);
var_dump($digitalProduct);
var_dump($weightProduct);