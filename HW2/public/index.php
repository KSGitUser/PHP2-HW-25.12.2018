<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../services/Autoloader.php';
use \app\models\Product;
use \app\services\Autoloader;
use \app\services\Db;
use \app\models\Order;

spl_autoload_register([new Autoloader(), 'loadClass']);

/* $product = new Product(1, 'товар', 'описание товара', 100, 3, $db);

$digitalProduct = new DigitalProduct(2, 'цифровой товар', 'описание товара', 100, 3);

$weightProduct = new WeightProduct(3, 'весовой товар', 'описание товара', 100, 3, 2); */

/* $product = Product::getOne(14);
$product->id = 14;
$product->name = "Автобус";
$product->description = "мерседес";
$product->price = 1050;
$product->vendor_id = 2;

$product->save(); */
/* $order = Order::getAll(); */


$controllerName = $_GET['c'] ?: DEFAULT_CONTROLLER;
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . 
                  ucfirst($controllerName) . "Controller";


if (class_exists($controllerClass)) {
  $controller = new $controllerClass();
  $controller->runAction($actionName);


}

$product = Product::getAll();









/* $product->insert(); */

 
/* $product->delete(); */

