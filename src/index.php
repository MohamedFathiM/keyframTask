<?php

use App\Keyframe\Config;
use App\Keyframe\LogViewer;

require "../vendor/autoload.php";

$filename = $_GET['path'];
$page = $_GET['page'];
$lastPage = $_GET['last_page'];
$content = '';

$configClass = (new Config)->readFile('config');

if (isset($filename) && !$lastPage) {
    $content =  (new LogViewer($filename, $configClass->get('limit') ?? 10))->streamFile($page);
}


if (isset($filename) && $lastPage) {
    $content =  (new LogViewer($filename, $configClass->get('limit') ?? 10))->getLastPage();
}

echo $content;
