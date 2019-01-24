<?php
namespace app\models\repositories;

use app\models\Basket;

class BasketRepository extends Repository
{

  public function getTableName() : string
  {
    return 'basket';
  }

  public function getRecordClass() 
  {
    return Basket::class;
  } 

}