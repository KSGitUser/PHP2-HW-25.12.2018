<?php

namespace app\models;

class Product extends Model
{
  public $id;
  public $user_id;
  public $product_id;
  public $quantity;

  public function getTableName() : string
  {
      return 'orders';
  }

}