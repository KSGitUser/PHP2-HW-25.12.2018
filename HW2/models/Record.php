<?php

namespace app\models;

use \app\interfaces\IRecord;
use \app\services\Db;

//абстрактный класс, от которого не создаются объекты

abstract class Record implements IRecord
{
    protected $db; //композиций - вызов внутри одного класса другого класса, в
    // данном случае Product является классом-контейнером для класса Db

    public function __construct()
    {
        $this->db = Db::getInstance(); // создали объект другого класса

    }


    /** @return static */
    public static function getOne(int $id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id"; /* используем плейсхолдер :id, чтобы избежать sql инъекций */
        return Db::getInstance()->
            queryObject($sql, [":id" => $id], get_called_class())[0];
    }

    public static function getAll()
    {
        $tableName = static::getTableName() ;
        $sql = "SELECT * FROM {$tableName}";
        /* return Db::getInstance()->queryAll($sql); */
        return Db::getInstance()->
            queryObject($sql, [], get_called_class());
    }

    private function insert()
    {

        $tableName = static::getTableName();

        $params = [];
        $columns = [];
        foreach ($this as $key => $value) {

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

     public function save()
    {   
        if ($this->id && static::getOne($this->id)) 
        {
            $this->update();
        } else {
            $this->insert();
        }
    }

    private function update() {
        $tableName = static::getTableName();
        $objectFromBase = static::getOne($this->id);        
        $params = [];
        $columns = [];
        foreach($this as $key => $value) {
            if (($objectFromBase->$key != $this->$key) 
                    && ($objectFromBase->$key !== 'db')) 
            {
                $params[":{$key}"] = $value;
                $columns[] ="`{$key}` = :{$key}";
            }
        }
        $params[":id"] = $this->id;
        $columns = implode(",", $columns);
        $placeholders = implode(",", array_keys($params));
        $sql = "UPDATE {$tableName}
                SET {$columns}
                WHERE id = :id;";
        if ($columns) {
            $this->db->execute($sql, $params);
        }
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, [":id" => $this->id]);
    }

}
