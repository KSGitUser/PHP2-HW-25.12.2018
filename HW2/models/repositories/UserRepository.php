<?php

namespace app\models\repositories;

class UserRepository extends Repository
{
  public function getTableName() : string
  {
    return 'users';
  }

  public function getRecordClass()
  {
    return User::class;
  } 
}