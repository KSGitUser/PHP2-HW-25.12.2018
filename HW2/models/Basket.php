<?php

namespace app\models;

use app\models\repositories\BasketRepository;
use app\controllers\ProductController;
use app\models\repositories\ProductRepository;
use app\base\App;

class Basket
{
  public $id;
  public $user_id;
  public $product_id;
  public $quantity;

  public function __construct($id = null, $user_id = null, $product_id = null, $quantity = null)
  {   
    $this->id;
    $this->product_id;
    $this->user_id;
    $this->quantity;
    $this->basket = [];
  }

  public function addToSession($productId, $quantaty)
  { 
    if (($productId) && ((int) $quantaty > 0)) {
      $_SESSION['basket'][$productId] += (int) $quantaty;
    }
  }

  public function getProductsWithAmmount() {
    $basketFromSession = $_SESSION['basket'];
    $productController = App::call()->productRepository;
    foreach ($basketFromSession as $productId=>$quantity) {
      if  ($productController->getOne((int) $productId)) {
         $product = $productController->getOne((int) $productId);
         $this->basket[] = ['product' => $product, 'ammount' => $quantity];
      };
     
    }
    return $this->basket;
  }
}