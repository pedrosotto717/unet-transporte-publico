<?php

namespace app\utils;


final class Request
{
  public static function getMethod()
  {
    return strtolower($_SERVER['REQUEST_METHOD']);
  }

  public static function getUrl()
  {
    return urldecode(
      parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
    );
  }

  public static function isGet()
  {
    return self::getMethod() === 'get';
  }

  public static function isPost()
  {
    return self::getMethod() === 'post';
  }

  public static function getBody()
  {
    $data = [];

    if (self::isGet()) {
      foreach ($_GET as $key => $value) {
        $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
      }
    }

    if (self::isPost()) {
      foreach ($_POST as $key => $value) {
        if (is_array($value)) {
          $data[$key] = filter_var_array($value, FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
          $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
      }
    }

    return (object) $data;
  }

  // getJson
}
