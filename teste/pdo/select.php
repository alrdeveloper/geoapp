<?php

require_once '../../vendor/autoload.php';

header('Content-Type: text/html; charset=utf8');

use application\ado\TSqlSelect;
use application\ado\TCriteria;
use application\ado\TFilter;
use application\ado\TConnection;

$sql = new TSqlSelect();
$sql->setEntity("tb_teste");
$sql->addColum("id");
$sql->addColum("nome");
$sql->addColum('status');

$criteria = new TCriteria();
$criteria->add(new TFilter('id', '=', 9));
$criteria->dump();
$sql->setCriteria($criteria);

try {
    $conn = TConnection::open('pg_app');
    $result = $conn->query($sql->getInstruction());
    if ($result) {
        $row = $result->fetch(\PDO::FETCH_ASSOC);
        echo $row['id'] . ' - ' . $row['nome'] . "<br />";
    }
    // Fecha a conexão
    $conn = null;
} catch (\PDOException $exc) {
    // exibe a mensagem de erro
    echo "Erro: " . $exc->getMessage() . "<br>";
    die();
}

/*
try {
    $conn = TConnection::open('my_app');
    $result = $conn->query($sql->getInstruction());
    if ($result) {
        $row = $result->fetch(\PDO::FETCH_ASSOC);
        echo $row['id'] . ' - ' . $row['nome'] . "<br />";
    }
    // Fecha a conexão
    $conn = null;
} catch (\PDOException $exc) {
    // exibe a mensagem de erro
    echo "Erro: " . $exc->getMessage() . "<br>";
    die();
}
*/