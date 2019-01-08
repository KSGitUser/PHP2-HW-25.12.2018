<?php

namespace app\models;

class DigitalProduct extends Product
{
    public function __construct($id, $name, $description, $price, $vendor_id) {
      parrent::__construct($id, $name, $description, $price, $vendor_id);
    }

    public function getPrice($price) {
      return $this->price/2;
    }

}