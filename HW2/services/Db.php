<?php

namespace app\services;
use \app\interfaces\IDb;

class Db implements IDb
{
    public function queryOne(string $sql, array $param = [])
    {
        return [];
    }

    public function queryAll(string $sql, array $param = [])
    {
        return [];
    }

}
