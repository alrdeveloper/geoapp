<?php

require_once './config.php';

use application\lib\AppController;

$url = $_SERVER["REQUEST_URI"];

$app = new AppController();
//incluir m�todo FILE no futuro
$app->main($url, $_POST, $_GET);


//$app->routeApplication();