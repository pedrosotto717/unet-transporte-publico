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
        push($view == "home" ? "/" : "$view");
        require $file;
      } else {
        return Views::render("not-found");
      }
    } catch (\Throwable $th) {
      return Views::render("error");
    }
  }

  // function to include partial view
  public static function include($view, $data = [])
  {
    $file = __DIR__ . '/../../views/partials/' . $view . '.php';

    extract($data, EXTR_SKIP);

    try {
      if (file_exists($file)) {
        require $file;
      } else {
        return "";
      }
    } catch (\Throwable $th) {
      return "";
    }
  }
}
