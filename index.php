<?php
ini_set('memory_limit', '256M');
define('ROOT_DIR', __DIR__);
define('ENV','Cms');
session_start();
error_reporting(-1);
date_default_timezone_set('Asia/Yekaterinburg');
// error_reporting(E_ALL);
// set_error_handler("handlerErrors");
// function handlerErrors($code, $msg, $file, $line) {
// $errors = date("m.d.y - H:i:s")." Ошибка: ".$code. " " .$msg. ", в файле " .$file. ", строка - " .$line."\n";
// file_put_contents("errors.log", $errors  ,FILE_APPEND);
// }


/*
** Правильный запрет кэширования на PHP
*/
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Expires: " . date("r"));

require_once 'engine/bootstrap.php';
