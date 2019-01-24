<?php
namespace app\controllers;

use app\models\Product;
use app\models\repositories;
use app\models\repositories\ProductRepository;
use app\services\Request;

class ProductController extends Controller
{
  public function getControllerName()
   {
      return 'product';
   }

  public function getDefault() 
  {
    return "catalog";
  }

  public function actionIndex()
  {
      $nameOfController = $this->getControllerName();
      $nameOfTemplate = $nameOfController . 's/' . static::getDefault();
      $product = (new ProductRepository())->getAll();
      echo $this->render($nameOfTemplate, [$nameOfController => $product]);
  } /* по традиции дефолтное действие index которое будет выполнятся
  в случае вызова контроллера без указания конкретного действия*/

  public function actionCard()
  {
      $id =(new Request())->getParams()['id'];
      $product = (new ProductRepository())->getOne($id);
      $nameOfController = (new Request())->getControllerName();      
      $actionName = (new Request())->getActionName(); 
      $nameOfTemplate = $nameOfController . 's/' . $actionName; 
      echo $this->render($nameOfTemplate, [$nameOfController => $product]);
  }


      
}