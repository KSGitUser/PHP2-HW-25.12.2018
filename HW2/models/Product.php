<?php

namespace app\models;
use \app\services\Db;

class Product extends Model
{
  public $id;
  public $name;
  public $description;
  public $price;
  public $vendor_id;
  public $allProducts;

 /*  public function __construct($id = null, $name = null, $description = null, $price = null, $vendor_id = null) */
 public function __construct($object = null)
  {
      parent::__construct();
      $this->id = $object->id;
      $this->name = $object->name;
      $this->description = $object->description;
      $this->price = $object->price;
      $this->vendor_id = $object->vendor_id; 
      $this->allProducts = $object;     
  }

  public function getTableName() : string
  {
      return 'products';
  }

  public function getPrice() {
    return $this->price;
  }

}