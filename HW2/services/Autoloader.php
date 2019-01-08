<?php

namespace app\services;

class Autoloader 
{
  public function loadClass($className)
  {
        $className = str_replace('app\\', '', $className);
        $className = str_replace('\\',DIRECTORY_SEPARATOR, $className);
        $filename = $_SERVER['DOCUMENT_ROOT'] . "/../{$className}.php";
        var_dump($filename);
        if (file_exists($filename)) {
            include $filename;
        } 
  }
}
