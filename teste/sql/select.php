<?php

/* 
 * Testando a criação do comando select 
 */

require_once '../../vendor/autoload.php';

use application\ado\TSqlSelect;
use application\ado\TCriteria;
use application\ado\TFilter;

$criteria = new TCriteria();
$criteria->add(new TFilter('id', '=', 1));
$criteria->dump();

$sql = new TSqlSelect();
$sql->setEntity("tb_pessoa");
$sql->addColum("id");
$sql->addColum("nome");
$sql->addColum("cpf");
$sql->setCriteria($criteria);
echo $sql->getInstruction() . "<br /> \n";


