<?php

return [
  'rootDir' => __DIR__ . "/../",
  'templatesDir' => __DIR__ . "/../views/",
  'defaultController' => 'product',
  'controllerNamespace' => "app\\controllers\\",
  'components' => [
      'db' => [
        'class' => \app\services\Db::class,
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'lovely',
        'charset' => 'utf8'        
      ],
      'request' => [
        'class' => \app\services\Request::class
      ],
      'renderer' => [
        'class' => \app\services\renderers\TemplateRenderer::class
      ]
  ]
      ];