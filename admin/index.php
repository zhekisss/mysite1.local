<?php
ini_set('memory_limit', '256M');
define('ROOT_DIR', __DIR__);
define('ENV','Admin');
/*
** Правильный запрет кэширования на PHP
*/
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Expires: " . date("r"));
// echo "<h1>", date("H:i:s"), "</h1>";

require_once '../engine/Bootstrap.php';