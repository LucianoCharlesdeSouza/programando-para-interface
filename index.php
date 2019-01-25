<?php 

require "vendor/autoload.php";

use App\Classes\Crud\MySQLi;
use App\Classes\Crud\PDO;
use App\Model\Menu;


/**
 * Podemos ver o quão importante é programar-mos para interfaces no exemplo abaixo,
 * podemos apenas mudar a classe injetada MySQLi para PDO que nossa classe Menu
 * manterá os mesmos comportamentos
 */

$menu = new Menu((new MySQLi));

/**
 * Comente a intância acima e descomente essa abaixo
 */
// $menu = new Menu((new PDO));

$result = $menu->select()
               ->get();

echo "<pre>";               
var_dump($result);
