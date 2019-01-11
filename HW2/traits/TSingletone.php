<?php

namespace app\traits;

trait TSingletone
{

    private static $instance = null;

    private function __construct()
    {}
    private function __clone()
    {}
    private function __wakeup()
    {}

    /* делам магическими методы private, что бы создать singletone, т.е. класс от которого можно будет создать лишь один объект.
    Через метод static getInstance()  определяем,
    был ли уже создан объект от класса*/

    /*трейты - (примеси) */

    /**@return static */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;

    }
}
