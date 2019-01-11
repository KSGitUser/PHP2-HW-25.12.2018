<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../services/Autoloader.php';
use \app\services\Autoloader;
use \app\services\Db;
use \app\models\Product;
use \app\models\DigitalProduct;
use \app\models\WeightProduct;

spl_autoload_register([new Autoloader(), 'loadClass']);


$product = new Product(1, 'товар', 'описание товара', 100, 3, $db);

$digitalProduct = new DigitalProduct(2, 'цифровой товар', 'описание товара', 100, 3);

$weightProduct = new WeightProduct(3, 'весовой товар', 'описание товара', 100, 3, 2);

/* var_dump($product);
var_dump($digitalProduct);
var_dump($weightProduct);
 */
/* var_dump($product->getAll()); */

$product2 = new Product((new Product())->getOne(2));

$product->AllProducts = $product->getAll();


var_dump($product2->getAll());

$product2->updateRecord(['id'=>6], ['name' => 'NewPlanes', 'price' => 170]);

$product2->deleteOne(9);


