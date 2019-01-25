<?php

/**
 * ConnMySQLi()
 *
 * Classe de conexão. Padrão SingleTon.
 * Retorna um objeto mysqli pelo método estático getInstance();
 *
 * @author Luciano Charles de Souza
 * E-mail: souzacomprog@gmail.com
 * Github: https://github.com/LucianoCharlesdeSouza
 * YouTube: https://www.youtube.com/channel/UC2bpyhuQp3hWLb8rwb269ew?view_as=subscriber
 */

namespace App\Classes\Conexao;

use \mysqli;

class ConnMySQLi
{

  /**
   * objeto mysqli
   * @var [mysqli]
   */
  private static $conn = null;

  /**
   * Retorna objeto mysqli
   * @return null|mysqli
   */
  private static function connect()
  {
    try {
      $db = require "App/config/database.php";

      if (self::$conn == null) {
        self::$conn = new mysqli($db['host'], $db['username'], $db['password'], $db['database'], $db['port']);
        self::$conn->set_charset($db['charset']);
      }
    } catch (\Exception $e) {
      throw new \Exception("Reveja suas credênciais!<br />Contate o administrador!");
    }
    return self::$conn;
  }

  /**
   * Executa método connect()
   * @return null|mysqli
   */
  public static function getInstance()
  {
    return static::connect();
  }

  /**
   * Construtor do tipo privado previne que uma nova instância da
   * Classe seja criada através do operador `new` de fora dessa classe.
   */
  private function __construct()
  {
  }

  /**
   * Método clone do tipo privado previne a clonagem dessa instância
   * da classe
   *
   * @return void
   */
  private function __clone()
  {
  }

  /**
   * Método unserialize do tipo privado  para reestabelecer qualquer
   * conexão com banco de dados que podem ter sido perdidas
   * durante a serialização,
   * e realizar outras tarefas de reinicialização
   *
   * @return void
   */
  private function __wakeup()
  {
    static::getInstance();
  }
}