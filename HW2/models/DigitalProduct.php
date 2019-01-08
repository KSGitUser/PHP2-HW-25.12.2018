<?php

namespace app\models;

class DigitalProduct extends Product
{
    public function __construct($id = null, $name = null, $description = null, $price = null, $vendor_id = null) {
      parent::__construct($id, $name, $description, $price, $vendor_id);
      $this->price = $this->getPrice();
    }

    public function getPrice() {
      return $this->price/2;
    }

}