<?php

/**
 * Model()
 *
 * Classe que recebe uma implementação da interface Crud e 
 * todos os seus metodos ja implementados
 *
 * @author Luciano Charles de Souza
 * E-mail: souzacomprog@gmail.com
 * Github: https://github.com/LucianoCharlesdeSouza
 * YouTube: https://www.youtube.com/channel/UC2bpyhuQp3hWLb8rwb269ew?view_as=subscriber
 */

namespace App\Classes;

use App\Interfaces\Crud;

abstract class Model
{
  private $crud;

  public function __construct(Crud $crud)
  {
    $this->crud = $crud;
    $this->crud->setTable($this->table);
  }

  public function findAll()
  {
    return $this->crud->findAll();
  }

  public function find($key, $value, $condition = '=')
  {
    return $this->crud->find($key, $value, $condition);
  }

  public function select($select = '*')
  {
    return $this->crud->select($select);
  }

  public function get()
  {
    return $this->crud->get();
  }

  public function first()
  {
    return $this->crud->first();
  }

}