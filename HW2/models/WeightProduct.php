<?php

namespace app\models;

class WeightProduct extends Product
{
    public $weight;

    public function __construct($id, $name, $description, $price, $vendor_id, $weight) {
      parrent::__construct($id, $name, $description, $price, $vendor_id);
      $this->weight = $weight;
    }

    public function getPrice($price) {
      return $this->price*$this->weight;
    }

}