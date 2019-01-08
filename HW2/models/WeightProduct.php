<?php

namespace app\models;

class WeightProduct extends Product
{
    public $weight;

    public function __construct($id = null, $name = null, $description = null, $price = null, $vendor_id = null, $weight = null) {
      parent::__construct($id, $name, $description, $price, $vendor_id);
      $this->weight = $weight;
      $this->price = $this->getPrice();
    }

    public function getPrice() {
      return $this->price*$this->weight;
    }

}