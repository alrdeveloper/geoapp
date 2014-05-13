<?php

require_once './vendor/autoload.php';

use application\dao\AppDaoMY;

$sql = "SELECT * FROM area WHERE id = 1 ORDER BY id ASC";

$app = new AppDaoMY();
$resultSet = $app->selectBySql($sql);

var_dump($resultSet);