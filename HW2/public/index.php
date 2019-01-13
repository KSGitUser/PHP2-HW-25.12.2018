<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../services/Autoloader.php';
use \app\models\Product;
use \app\services\Autoloader;
use \app\services\Db;

spl_autoload_register([new Autoloader(), 'loadClass']);

/* $product = new Product(1, 'товар', 'описание товара', 100, 3, $db);

$digitalProduct = new DigitalProduct(2, 'цифровой товар', 'описание товара', 100, 3);

$weightProduct = new WeightProduct(3, 'весовой товар', 'описание товара', 100, 3, 2); */

$product = Product::getOne(14);
$product->id = 14;
$product->name = "Автобус";
$product->description = "мерседес";
$product->price = 1050;
$product->vendor_id = 2;

$product->save();




/* $product2->updateRecord(['id' => 6], ['name' => 'NewPlanes', 'price' => 170]); */

/* var_dump($product); */
/* $product->insert(); */
var_dump($product);
 
/* $product->delete(); 
var_dump($product); */
