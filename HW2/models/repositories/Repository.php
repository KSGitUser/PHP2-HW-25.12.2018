<?php
namespace app\models\repositories;

use app\interfaces\IRepository;
use app\services\Db;
use app\base\App;


abstract class Repository implements IRepository
{
  protected $db; //композиций - вызов внутри одного класса другого класса, в
  // данном случае Product является классом-контейнером для класса Db

  public function __construct()
  {
      $this->db = $this->getDb(); // создали объект другого класса
      

  }

  protected function getDb()
  {
      $db =  App::call()->db;
      if (empty($db)) {
          throw new \Exception("Не удалось создать подключение!"); 
          //выкидываем ошибку если не удалось подключиться к базе данных
      }
      return $db;       
  }
  


  /** @return static */
  public function getOne(int $id)
  {
      $tableName = $this->getTableName();
      $sql = "SELECT * FROM {$tableName} WHERE id = :id"; /* используем плейсхолдер :id, чтобы избежать sql инъекций */
    
      return $this->db->
          queryObject($sql, [":id" => $id], $this->getRecordClass())[0];
  }

  public function getAll()
  {
      $tableName = $this->getTableName();
      $sql = "SELECT * FROM {$tableName}";
      return $this->db->
          queryObject($sql, [],  $this->getRecordClass());
  }

  private function insert(Record $record)
  {

      $tableName = $this->getTableName();

      $params = [];
      $columns = [];
      foreach ($record as $key => $value) {

              if ($key == 'db') {
                  continue;
              }
              $params [":{$key}"] = $value;
              $columns[] ="`{$key}`";
          }
          $columns = implode(",", $columns);
          $placeholders = implode(",", array_keys($params));
          $sql .= "INSERT INTO {$tableName} ({$columns})
              VALUES ({$placeholders});";

      $this->db->execute($sql, $params);
      $this->id = $this->db->getLastInsertId();

  }

   public function save(Record $record)
  {   
      if ($record->id && $this->getOne($record->id)) 
      {
          $this->update();
      } else {
          $this->insert();
      }
  }

  private function update(Record $record) {
      $tableName = $this->getTableName();
      $objectFromBase = $this->getOne($record->id);        
      $params = [];
      $columns = [];
      foreach($record as $key => $value) {
          if (($objectFromBase->$key != $record->$key) 
                  && ($objectFromBase->$key !== 'db')) 
          {
              $params[":{$key}"] = $value;
              $columns[] ="`{$key}` = :{$key}";
          }
      }
      $params[":id"] = $record->id;
      $columns = implode(",", $columns);
      $placeholders = implode(",", array_keys($params));
      $sql = "UPDATE {$tableName}
              SET {$columns}
              WHERE id = :id;";
      if ($columns) {
          $this->db->execute($sql, $params);
      }
  }

  public function delete(Record $record)
  {
      $tableName = $this->getTableName();
      $sql = "DELETE FROM {$tableName} WHERE id = :id";
      return $this->db->queryOne($sql, [":id" => $record->id]);
  }


  abstract public function getRecordClass();
}