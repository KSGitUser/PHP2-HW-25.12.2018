<?php

/* Использование singletone делает классы зависимыми от него, и использовать их в дальнейшем без него будет проблематично. Также сложней или вообще становится
не возможным произвотить тестирование отдельного класса, зависящего от сингелтона */

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

    /* делаем магическими методы private, что бы создать singletone, т.е. класс от которого можно будет создать лишь один объект.
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
