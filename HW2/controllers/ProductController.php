<?php
namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{
  public static function getContollerName() : string
   {
      return 'product';
   }

  public static function getDefault() 
  {
    return "catalog";
  }

  public function actionIndex()
  {
     
      $nameOfController = static::getContollerName();
      $nameOfTemplate = $nameOfController . 's/' . static::getDefault();
      $product = Product::getAll();
      echo $this->render($nameOfTemplate, [$nameOfController => $product]);
  } /* по традиции дефолтное действие index которое будет выполнятся
  в случае вызова контроллера без указания конкретного действия*/

  public function actionCard()
  {
      $id = $_GET['id'];
      $product = Product::getOne($id);
      $nameOfController = static::getContollerName();
      $nameOfTemplate = $nameOfController . 's/card'; 
      echo $this->render($nameOfTemplate, [$nameOfController => $product]);
  }


}