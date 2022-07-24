<?php

namespace app\utils;


class Views
{
  public static function render($view)
  {
    $file = __DIR__ . '/../../views/' . $view . '.php';
    if (file_exists($file)) {
      require_once $file;
    } else {
      throw new \Exception("Error Processing Request", 1);
    }
  }
}
