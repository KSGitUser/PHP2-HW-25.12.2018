<?php
namespace app\controllers;

use app\models\Order;

class OrderController extends Controller
{
  public static function getContollerName() : string
   {
      return 'order';
   }

  public static function getDefault() 
  {
    return "catalog";
  }



  public function actionIndex()
  {
      $nameOfController = static::getContollerName();
      $nameOfTemplate = $nameOfController . 's/' . static::getDefault();
      $product = Order::getAll();
      echo $this->render($nameOfTemplate, [$nameOfController => $product]);
  } /* по традиции дефолтное действие index которое будет выполнятся
  в случае вызова контроллера без указания конкретного действия*/

  public function actionCard()
  {
      $id = $_GET['id'];
      $product = Order::getOne($id);
      $nameOfController = static::getContollerName();
      $nameOfTemplate = $nameOfController . 's/card'; 
      echo $this->render("card", [$nameOfController => $product]);
  }






}