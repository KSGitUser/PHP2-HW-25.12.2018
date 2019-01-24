<?php
session_start();

/* include $_SERVER['DOCUMENT_ROOT'] . '/../services/Autoloader.php'; */
/* заменил автозагрузчиком из Composer */
require_once $_SERVER['DOCUMENT_ROOT'] .'/../vendor/autoload.php';
$config = include '../config/main.php';





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




\app\base\App::call()->run($config);


/* $product = Product::getAll(); */









/* $product->insert(); */

 
/* $product->delete(); */

