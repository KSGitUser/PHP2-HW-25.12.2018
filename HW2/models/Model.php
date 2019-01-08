<?php

namespace app\models;
use \app\services\Db;
use \app\interfaces\IModel;
use \app\interfaces\IDb;

//абстрактный класс, от которого не создаются объекты

abstract class Model implements IModel
{
    protected $db; //композиций - вызов внутри одного класса другого класса, в
    // данном случае Product является классом-контейнером для класса Db


    public function __construct(IDb $db)
    {
          $this->db = $db; // создали объект другого класса
          $this->tableName = $this->getTableName();
    }

    public function getOne(int $id)
    {
          
          $sql = "SELECT * FROM {$this->tableName} WHERE id = {$id}";
          return $this->db->queryOne($sql);
    }

    public function getAll()
    {
          $sql = "SELECT * FROM {$this->tableName}";
          return $this->db->queryOne($sql);
    }
      

}