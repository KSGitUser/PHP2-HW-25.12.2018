<?php

namespace app\models;

use app\models\repositories;

class Product extends Record
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $vendor_id;

    /*  public function __construct($id = null, $name = null, $description = null, $price = null, $vendor_id = null) */
    public function __construct($id = null, $name = null, $description = null, $price = null, $vendor_id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->vendor_id = $vendor_id;
    }


    public function getPrice()
    {
        return $this->price;
    }


}
