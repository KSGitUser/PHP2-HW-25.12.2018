<?php
namespace app\controllers;

use app\models\Basket;
use app\models\repositories;
use app\models\repositories\BasketRepository;
use app\services\Request;
use app\base\App;

class BasketController extends Controller
{
  public function getControllerName()
   {
      return 'basket';
   }

  public function getDefault() 
  {
    return "catalog";
  }

  public function actionIndex()
  {
      $nameOfController = $this->getControllerName();
      $nameOfTemplate = $nameOfController . 's/' . static::getDefault();
      $product = App::call()->basketRepository->getAll();
      echo $this->render($nameOfTemplate, [$nameOfController => $product]);
  } /* по традиции дефолтное действие index которое будет выполнятся
  в случае вызова контроллера без указания конкретного действия*/

  public function actionPreview()
  {
    $nameOfController = $this->getControllerName();
    $nameOfTemplate = $nameOfController . 's/preview';
    $basket = App::call()->basket->getProductsWithAmmount();
    echo $this->render($nameOfTemplate, [$nameOfController => $basket]);
}


      
}