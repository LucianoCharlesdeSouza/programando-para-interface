# Programando para interface
  Estudos sobre `interfaces` php

```php
        require "vendor/autoload.php";

        use App\Classes\Crud\MySQLi;
        use App\Classes\Crud\PDO;
        use App\Model\Menu;
```


  Podemos ver o quão importante é programar-mos para interfaces no exemplo abaixo!

  Podemos apenas mudar a classe injetada `MySQLi` para `PDO` que nossa classe `Menu`
 manterá os mesmos comportamentos!
 
```php
        $menu = new Menu((new MySQLi));
```

  Comente a instância acima para usar a classe `PDO`!

```php
        $menu = new Menu((new PDO));

        $result = $menu->select()->get();

        echo "<pre>";  

        var_dump($result);
```        
