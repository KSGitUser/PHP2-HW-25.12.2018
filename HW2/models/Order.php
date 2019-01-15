<?php

namespace app\models;

class Order extends Record
{
  public $id;
  public $user_id;
  public $product_id;
  public $quantity;

  public static function getTableName() : string
  {
      return 'orders';
  }

}