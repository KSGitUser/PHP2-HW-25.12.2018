<?php
namespace app\controllers;

use app\models\Order;
use app\services\Request;
use app\models\repositories\OrderRepository;

class OrderController extends Controller
{
  public function getControllerName() : string
   {
      return 'order';
   }

  public static function getDefault() 
  {
    return "catalog";
  }



  public function actionIndex()
  {
      $nameOfController = $this->getControllerName();
      $nameOfTemplate = $nameOfController . 's/' . static::getDefault();
      $product = App::call()->orderRepository->getAll();
      echo $this->render($nameOfTemplate, [$nameOfController => $product]);
  } /* по традиции дефолтное действие index которое будет выполнятся
  в случае вызова контроллера без указания конкретного действия*/

  public function actionCard()
  {
      $id = App::call()->request->getParams()['id'];
      $product = App::call()->orderRepository->getOne($id);
      $nameOfController = App::call()->request->getControllerName();
      $actionName = App::call()->request->getActionName();
      $nameOfTemplate = $nameOfController . 's/' . $actionName; 
      echo $this->render($nameOfTemplate, [$nameOfController => $product]);
  }






}