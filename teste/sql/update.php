<?php

/* 
 * Testando a criação do comando update
 */
require_once '../../vendor/autoload.php';

use application\ado\TSqlUpdate;
use application\ado\TCriteria;
use application\ado\TFilter;

$criteria = new TCriteria();
$criteria->add(new TFilter('id', '=', 1));
$criteria->dump();

$sql = new TSqlUpdate();
$sql->setEntity("tb_pessoa");
$sql->setRowData("nome", "Allan Roberto");
$sql->setRowData("cpf", "92969208172");
$sql->setRowData("rg", "464588");
$sql->setCriteria($criteria);
echo $sql->getInstruction() . "<br />\n";