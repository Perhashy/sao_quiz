<?php

spl_autoload_register(function($class) {
  $prefix = 'MyApp\\';

  if (strpos($class, $prefix) === 0) {
    $classname = substr($class, strlen($prefix));
    $classFilePath = __DIR__ . '/' . $classname . '.php';

    if (file_exists($classFilePath)) {
      require $classFilePath;
    } else {
      echo 'No such class: ' . $classname;
      exit;
    }
  }
});