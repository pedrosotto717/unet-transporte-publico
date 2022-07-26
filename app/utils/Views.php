<?php

namespace app\utils;


class Views
{
  public static function render($view, $data = [])
  {
    $file = __DIR__ . '/../../views/' . $view . '.php';

    extract($data, EXTR_SKIP);

    try {
      if (file_exists($file)) {
        ob_start();
        require $file;
      } else {
        return Views::render("not-found");
      }
    } catch (\Throwable $th) {
      ob_end_clean();
      return Views::render("error");
    }

    echo ob_get_clean();
  }
}
