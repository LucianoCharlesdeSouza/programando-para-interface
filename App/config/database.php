<?php

return [
  'driver' => 'mysql',
  'host' => 'localhost',
  'port' => 3306,
  'database' => 'myframe',
  'username' => 'root',
  'password' => '',
  'unix_socket' => '',
  'charset' => 'utf8',
  'options' => [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_PERSISTENT => true
  ],
  'errmode' => PDO::ERRMODE_EXCEPTION,
  'fetch_mode' => PDO::FETCH_OBJ
];