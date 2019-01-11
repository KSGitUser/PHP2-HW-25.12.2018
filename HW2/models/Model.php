<?php

namespace app\models;

use \app\interfaces\IModel;
use \app\services\Db;

//абстрактный класс, от которого не создаются объекты

abstract class Model implements IModel
{
    protected $db; //композиций - вызов внутри одного класса другого класса, в
    // данном случае Product является классом-контейнером для класса Db

    public function __construct()
    {
        $this->db = Db::getInstance(); // создали объект другого класса

    }

    public function getOne(int $id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id"; /* используем плейсхолдер :id, чтобы избежать sql инъекций */
        return $this->db->queryOne($sql, [":id" => $id]);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

    public function insertRecord(array $arrayOfRecods)
    {
        $tableName = $this->getTableName();
        foreach ($arrayOfRecods as $record) {
            foreach ($record as $key => $value) {
                $templateKey[] = $key;
                /* $templateValues[':column' . $key] = $key; */
                $templateValue[] = ':value' . $key;
                $templateValues[':value' . $key] = $value;

            }
            $columnsNames = implode(",", $templateKey);
            $valuesString = implode(",", $templateValue);
            $sql .= "INSERT INTO {$tableName} ({$columnsNames})
                VALUES ({$valuesString});";
        }

        return $this->db->execute($sql, $templateValues);

    }

    public function updateRecord($searchParam, array $arrayOfParams)
    {
        $tableName = $this->getTableName();
        foreach ($arrayOfParams as $key => $value) {
            $templateNames[] = "{$key} = :{$key}";
        }
        $templateStr = implode(",", $templateNames);
        $searchKey = array_keys($searchParam)[0];
        $sql = "UPDATE {$tableName}
                SET {$templateStr}
                WHERE {$searchKey} = :{$searchKey};";
        $allParams = array_merge($arrayOfParams, $searchParam);
        return $this->db->execute($sql, $allParams);
    }

    public function deleteOne(int $id)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id"; 
        return $this->db->queryOne($sql, [":id" => $id]);
    }

}
