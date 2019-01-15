<?php
namespace app\controllers;

use app\models\Order;

class OrderController extends Controller
{
  public static function getContollerName() : string
   {
      return 'order';
   }

  public static function getOne($id) 
  {
    return Order::getOne($id);
  }

  public static function getDefault() 
  {
    return "catalog";
  }

  public static function getAll() 
  {
    return Order::getAll();
  }


}