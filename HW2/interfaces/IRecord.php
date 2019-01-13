<?php

namespace app\interfaces;

// интерфейс - специальный класс, включающий всебя только описание только 
// публичных методов

interface IRecord
{
  static function getOne(int $id);

  static function getAll();

  static function getTableName() : string;  //абстрактный метод
    // содержит
    // только описание, нет реализации,
    // если в классе есть хоть один абстрактный
    // метод класс должен быть абстрактным. Наследники либо должны реализовать
    // абстактный метод, либо сами стать абстактными


  // так как интерфейс может содержать толко абстарактные и публичные
  // методы писать abstract и public ненужно
}