<?php

/**
 * Crud interface
 *
 * @author Luciano Charles de Souza
 * E-mail: souzacomprog@gmail.com
 * Github: https://github.com/LucianoCharlesdeSouza
 * YouTube: https://www.youtube.com/channel/UC2bpyhuQp3hWLb8rwb269ew?view_as=subscriber
 */
namespace App\Interfaces;

interface Crud
{

  public function setTable($table);
  public function select($select = '*');
  public function find($key, $value, $condition = '=');
  public function get($fetch = false);
  
}