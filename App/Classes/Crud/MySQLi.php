<?php

/**
 * MySQLi()
 *
 * Classe que implementa os metodos da interface Crud para lidar
 * com os SQL usando a lib mysqli
 *
 * @author Luciano Charles de Souza
 * E-mail: souzacomprog@gmail.com
 * Github: https://github.com/LucianoCharlesdeSouza
 * YouTube: https://www.youtube.com/channel/UC2bpyhuQp3hWLb8rwb269ew?view_as=subscriber
 */

namespace App\Classes\Crud;

use App\Interfaces\Crud;
use App\Classes\Conexao\ConnMySQLi;
use App\Classes\Sql\Sql;

class MySQLi extends Sql implements Crud
{

  private $conn;
  private $table;
  private $select = '*';

  public function __construct()
  {
    $this->conn = ConnMySQLi::getInstance();
  }

  public function setTable($table)
  {
    $this->table = $table;
  }

  public function findAll()
  {
    $stmt = $this->conn->prepare($this->findAll_($this->table));
    $stmt->execute();
    $result = $stmt->get_result();

    return $this->getDataMysqli($result);
  }

  public function select($select = '*')
  {
    $this->select = $select;
    return $this;
  }

  public function find($key, $value, $condition = '=')
  {
    $stmt = $this->conn->prepare($this->find_($this->table, $key, $condition));
    $stmt->bind_param("s", $value);
    $stmt->execute();
    $result = $stmt->get_result();

    return $this->getDataMysqli($result);
  }

  public function get($fetch = false)
  {
    $sql = $this->get_($this->select, $this->table);
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$fetch) {
      return $this->getDataMysqli($result);
    }
    return $this->getDataMysqli($result)[0];
  }

  public function first()
  {
    return $this->get(true);
  }

}