<?php

/**
 * Sql()
 *
 * Classe abstrata(não pode ser instanciada) que resolve o SQL
 *
 * @author Luciano Charles de Souza
 * E-mail: souzacomprog@gmail.com
 * Github: https://github.com/LucianoCharlesdeSouza
 * YouTube: https://www.youtube.com/channel/UC2bpyhuQp3hWLb8rwb269ew?view_as=subscriber
 */

namespace App\Classes\Sql;

abstract class Sql
{

  protected function find_($table, $key, $condition = '=')
  {
    return "SELECT * FROM {$table} WHERE {$key} {$condition} ?";
  }

  protected function get_($select, $table)
  {
    return "SELECT {$select} FROM {$table}";
  }

  protected function getDataMysqli($result)
  {
    $array = [];

    while ($row = $result->fetch_assoc()) {
      $array[] = (object)$row;
    }

    return $array;
  }
}