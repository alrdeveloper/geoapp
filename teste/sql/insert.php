<?php

/* 
 * Testando a criação do comando insert
 */

require_once '../../vendor/autoload.php';

use application\ado\TSqlInsert;

$sql = new TSqlInsert();
$sql->setEntity("tb_pessoa");
$sql->setRowData("identificador", "asdfa8-086a0s7df60asd7fa");
$sql->setRowData("tipo_pessoa", 1);
$sql->setRowData("nome", "Allan Roberto");
$sql->setRowData("cpf", "92969208172");
$sql->setRowData("rg", "464588");
$sql->setRowData("orgao_expedidor", "SSP/TO");
$sql->setRowData("data_emissao", "2007-10-17");
$sql->setRowData("status", "1");
// Processa a instrução SQL
echo $sql->getInstruction() . "<br /> \n";


