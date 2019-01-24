<?php
session_start();

/* include $_SERVER['DOCUMENT_ROOT'] . '/../services/Autoloader.php'; */
/* заменил автозагрузчиком из Composer */
require_once $_SERVER['DOCUMENT_ROOT'] .'/../vendor/autoload.php';

use \app\models\Product;
use \app\services\Autoloader;
use \app\services\Db;
use \app\models\Order;
use app\services\renderers\TemplateRenderer;
use app\services\Request;
use \app\models\Basket;

/* spl_autoload_register([new Autoloader(), 'loadClass']); */

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

$request = new Request();


$controllerName = $request->getControllerName() ?: DEFAULT_CONTROLLER;
$actionName = $request->getActionName();

$controllerClass = CONTROLLER_NAMESPACE . 
                  ucfirst($controllerName) . "Controller";


if (class_exists($controllerClass)) {
  $controller = new $controllerClass(new \app\services\renderers\TemplateRenderer());
  $controller->runAction($actionName);


}


$params = $request->getParams();
$basket = new Basket();
$basket->addToSession($params['productId'], $params['quantity']);





/* $product = Product::getAll(); */









/* $product->insert(); */

 
/* $product->delete(); */

