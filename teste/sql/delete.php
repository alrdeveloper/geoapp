<?php

/* 
 * Testando a criação do comando delete 
 */
require_once '../../vendor/autoload.php';

use application\ado\TSqlDelete;
use application\ado\TCriteria;
use application\ado\TFilter;

$criteria = new TCriteria();
$criteria->add(new TFilter('id', '=', 1));
$criteria->dump();

$sql = new TSqlDelete();
$sql->setEntity("tb_pessoa");
$sql->setCriteria($criteria);
echo $sql->getInstruction() . "<br /> \n";