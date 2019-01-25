<?php

/**
 * PDO()
 *
 * Classe que implementa os metodos da interface Crud para lidar
 * com os SQL usando a lib PDO
 *
 * @author Luciano Charles de Souza
 * E-mail: souzacomprog@gmail.com
 * Github: https://github.com/LucianoCharlesdeSouza
 * YouTube: https://www.youtube.com/channel/UC2bpyhuQp3hWLb8rwb269ew?view_as=subscriber
 */

namespace App\Classes\Crud;

use App\Interfaces\Crud;
use App\Classes\Conexao\ConnPDO;
use App\Classes\Sql\Sql;

class PDO extends Sql implements Crud
{

  private $pdo;
  private $table;
  private $select = '*';

  public function __construct()
  {
    $this->pdo = ConnPDO::getInstance();
  }

  public function setTable($table)
  {
    $this->table = $table;
  }

  public function find($key, $value, $condition = '=')
  {
    $stmt = $this->pdo->prepare($this->find_($this->table, $key, $condition));
    $stmt->execute([$value]);
    return $stmt->fetchAll();
  }

  public function select($select = '*')
  {
    $this->select = $select;
    return $this;
  }

  public function get($fetch = false)
  {
    $sql = $this->get_($this->select, $this->table);
  
    $stmt = $this->pdo->prepare($sql);

    $stmt->execute();

    if (!$fetch) {
      return $stmt->fetchAll();
    }
    return $stmt->fetch();
  }

  public function first()
  {
    return $this->get(true);
  }

}