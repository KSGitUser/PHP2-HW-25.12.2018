<?php

namespace app\interfaces;

interface IDb
{
  function queryOne(string $sql, array $param = []);

  function queryAll(string $sql, array $param = []);
}