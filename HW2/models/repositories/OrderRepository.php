<?php
namespace app\models\repositories;

use app\models\Order;

class OrderRepository extends Repository
{

  public function getTableName() : string
  {
    return 'orders';
  }

  public function getRecordClass() 
  {
    return Order::class;
  } 

}