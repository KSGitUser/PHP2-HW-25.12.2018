<?php
namespace app\controllers;

use app\models\Product;
use app\models\repositories;
use app\models\repositories\ProductRepository;
use app\services\Request;
use app\base\App;

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
      $product = App::call()->productRepository->getAll();
      echo $this->render($nameOfTemplate, [$nameOfController => $product]);
  } /* по традиции дефолтное действие index которое будет выполнятся
  в случае вызова контроллера без указания конкретного действия*/

  public function actionCard()
  {
      $id =App::call()->request->getParams()['id'];
      $product = App::call()->productRepository->getOne($id);
      $nameOfController = App::call()->request->getControllerName();      
      $actionName = App::call()->request->getActionName(); 
      $nameOfTemplate = $nameOfController . 's/' . $actionName; 
      echo $this->render($nameOfTemplate, [$nameOfController => $product]);
  }


      
}