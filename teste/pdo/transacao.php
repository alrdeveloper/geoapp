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
    // Cria uma instrução INSERT
    $sql = new TSqlInsert();
    // Nome da tabela
    $sql->setEntity("tb_teste");
    // Colunas e valores
    $nome = utf8_encode("Nome Teste 1 Zé");
    $sql->setRowData("nome", $nome);
    $sql->setRowData("status", 1);

//    print $sql->getInstruction();;
//    exit();
    // Pegar conexão ativa
    $conn = TTransaction::get();
    // Executa a transação
    $result = $conn->Query($sql->getInstruction());
    echo TTransaction::lastInsertId("tb_teste_id_seq");
    
    // Cria uma instrução UPDATE
    $sql = new TSqlUpdate();
    // Nome da tabela
    $sql->setEntity("tb_teste");
    // Coluna e Valor
    $nome = utf8_encode("dedé");
    $sql->setRowData("nome", $nome);
    
    // Critério para atualização
    $criteria = new TCriteria();
    $criteria->add(new TFilter('id', '=', "2"));
    // Adicionando o critério ao comando sql
    $sql->setCriteria($criteria);
    
    // Pega a conexão ativa
    $conn = TTransaction::get();
    // Executa o comando sql
    $result = $conn->Query($sql->getInstruction());
    
    TTransaction::close();
} catch (\Exception $exc) {
    // Retorna a mensagem de erro
    echo $exc->getTraceAsString();
    // Desfaz as operações realizadas durante a transação
    TTransaction::rollback();
}
