<?php

namespace app\services;

use PDO;
use \app\interfaces\IDb;
use \app\traits\TSingletone;

class Db implements IDb
{
    use TSingletone; /* подмешиваем трейтс, сюда будет помещен код из трейтс, этот код становится частью класса */

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'lovely',
        'charset' => 'utf8',
    ];


    private $conn = null; /* переменная чтобы хранить соединение */

 
    private function getConnection()
    {
        if (is_null($this->conn)) {

            $this->conn = new \PDO(
                $this->prepareDnsString(),
                $this->config['login'],
                $this->config['password']
            );

        }

        $this->conn->setAttribute(
            \PDO::ATTR_DEFAULT_FETCH_MODE,
            \PDO::FETCH_OBJ
        ); /* устанавливаем атрибуты для PDO получение данных из базы данных в ассоциативный массив: возвращает массив, индексированный именами столбцов результирующего набора*/

        return $this->conn;

    } /* метод отложенной инициализации (инициализация по требованию) подключения к базе данных*/

    /* подготовленные SQL запросы (:id), помогают почти полсностью исключить возможность SQL инъенкция */

    private function query(string $sql, array $params = [])
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params); /*выполнение запроса к базе данных c указанными параметрами */
        return $pdoStatement;
    }

    public function queryObject($sql, $params = [], $className) 
    {
        $pdoStatement = $this->query($sql, $params);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $className); 
        return $pdoStatement->fetchAll();        
    }

    public function getLastInsertId()
    {
       return $this->getConnection()->lastInsertId();
    }

    public function queryOne(string $sql, array $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function execute(string $sql, array $params = [])
    {
        $this->query($sql, $params);
        return true;
    }

    private function prepareDnsString()
    {
        return sprintf('%s:host=%s;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

}
