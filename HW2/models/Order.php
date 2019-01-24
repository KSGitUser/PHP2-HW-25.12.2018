<?php

namespace app\models;

class Order extends Record
{
  public $id;
  public $user_id;
  public $product_id;
  public $quantity;

  public function __construct($id = null, $user_id = null, $product_id =null, $quantity = null)
  {
    $this->id = $id;
    $this->user_id = $user_id;
    $this->product_id = $product_id;
    $this->quantity = $quantity;
  }

  public static function getTableName() : string
  {
      return 'orders';
  }



}