<?php

require_once './vendor/autoload.php';

header('Content-Type: text/html; charset=utf8');

use application\ado\TTransaction;
use application\ado\TSqlInsert;
use application\ado\TSqlUpdate;
use application\ado\TCriteria;
use application\ado\TFilter;

try {
    TTransaction::open('pg_app');
    // Cria uma instru��o INSERT
    $sql = new TSqlInsert();
    // Nome da tabela
    $sql->setEntity("tb_teste");
    // Colunas e valores
    $nome = utf8_encode("Nome Teste 1 Z�");
    $sql->setRowData("nome", $nome);
    $sql->setRowData("status", 1);

//    print $sql->getInstruction();;
//    exit();
    // Pegar conex�o ativa
    $conn = TTransaction::get();
    // Executa a transa��o
    $result = $conn->Query($sql->getInstruction());
    echo TTransaction::lastInsertId("tb_teste_id_seq");
    
    // Cria uma instru��o UPDATE
    $sql = new TSqlUpdate();
    // Nome da tabela
    $sql->setEntity("tb_teste");
    // Coluna e Valor
    $nome = utf8_encode("ded�");
    $sql->setRowData("nome", $nome);
    
    // Crit�rio para atualiza��o
    $criteria = new TCriteria();
    $criteria->add(new TFilter('id', '=', "2"));
    // Adicionando o crit�rio ao comando sql
    $sql->setCriteria($criteria);
    
    // Pega a conex�o ativa
    $conn = TTransaction::get();
    // Executa o comando sql
    $result = $conn->Query($sql->getInstruction());
    
    TTransaction::close();
} catch (\Exception $exc) {
    // Retorna a mensagem de erro
    echo $exc->getTraceAsString();
    // Desfaz as opera��es realizadas durante a transa��o
    TTransaction::rollback();
}
