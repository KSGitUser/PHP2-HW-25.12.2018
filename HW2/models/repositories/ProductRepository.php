<?php
namespace app\models\repositories;

use app\models\Product;

class ProductRepository extends Repository
{

  public function getTableName() : string
  {
    return 'products';
  }

  public function getRecordClass() 
  {
    return Product::class;
  } 

  public function getSeveralsById($ids, $params = [])
  {
      $tableName = $this->getTableName();
      $sql = "SELECT * FROM {$tableName} WHERE id IN :id"; /* используем плейсхолдер :id, чтобы избежать sql инъекций */
    
      return $this->db->
          queryObject($sql, [":id" => $id], $this->getRecordClass())[0];
  }

}