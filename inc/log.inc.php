<?php
if (!defined('PATH_LOG')) {
    define('PATH_LOG', 'path.log');
}

$logDir = __DIR__ . '/../log';
if (!is_dir($logDir)) {
    mkdir($logDir, 0777, true);
}

$dt   = time();                                                  
$page = isset($_SERVER['REQUEST_URI'])  ? $_SERVER['REQUEST_URI']  : '';
$ref  = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

$path = "$dt|$page|$ref\n";

file_put_contents($logDir . '/' . PATH_LOG, $path, FILE_APPEND | LOCK_EX);
