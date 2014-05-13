<?php

namespace application\dao;

/**
 * Description of TTransaction
 * Classe responsavel por prover os metodos necessarios para manipular transacoes
 * @author allan roberto
 */
class AppDao implements IDao {
    
    public function insert(AppInstructionSQL $sql, $values, $sequence) {
        // Abrindo a conexão com o banco de dados
        $strConn = new TConnection();
        // Especificando o banco de dados que será utilizado
        $conn = $strConn->open("pg_app");
        try {
            // Abrindo uma transação
            $strConn->beginTransaction();

            // Preparando o comando SQL
            $stmp = $conn->prepare($sql->getSql());
            // Percorrendo os parametros
            for ($i = 0; $i < count($values); $i++) {
                $stmp->bindValue($values[$i]["attribute"], "'" . $values[$i]["values"] . "'");
            }
            // Executando a operação no banco de dados
            $stmp->execute();

            // Recuperando o id da linha cadastrada no banco de dados
            $result = $conn->lastInsertId($sequence);

            // Comitando a operação
            $strConn->commit();

            // Retornando valor da transação
            return $result;
        } catch (\PDOException $exc) {
            // Cancelando a transação com o banco de dados
            $strConn->rollback();
            $msg[] = "<strong>Código:</strong> " . $exc->getCode();
            $msg[] = "<strong>Arquivo:</strong> " . $exc->getFile();
            $msg[] = "<strong>Linha:</strong> " . $exc->getLine();
            $msg[] = "<strong>Mensagem:</strong> " . $exc->getMessage();
            // Retornando o erro caso exista
            return $msg;
        }
    }

    public function update(AppInstructionSQL $sql, $values) {
        // Abrindo a conexão com o banco de dados
        $strConn = new TConnection();
        // Especificando o banco de dados que será utilizado
        $conn = $strConn->open("pg_app");
        try {
            // Abrindo uma transação
            $strConn->beginTransaction();

            // Preparando o comando SQL
            $stmp = $conn->prepare($sql->getSql());
    
            // Percorrendo os parametros
            for ($i = 0; $i < count($values); $i++) {
                $stmp->bindValue($values[$i]["attribute"], "'" . $values[$i]["values"] . "'");
            }
            // Executando a operação no banco de dados
            $stmp->execute();

            // Retorna a quantidade de registros afetados
            $result = $stmp->rowCount();

            // Comitando a operação
            $strConn->commit();

            // Retornando valor da transação
            return $result;
        } catch (\PDOException $exc) {
            // Cancelando a transação com o banco de dados
            $strConn->rollback();
            $msg[] = "<strong>Código:</strong> " . $exc->getCode();
            $msg[] = "<strong>Arquivo:</strong> " . $exc->getFile();
            $msg[] = "<strong>Linha:</strong> " . $exc->getLine();
            $msg[] = "<strong>Mensagem:</strong> " . $exc->getMessage();
            // Retornando o erro caso exista
            return $msg;
        }
    }

    public function countListData(AppInstructionSQL $sql, $values) {
        // TODO: Auto-generated method stub
    }

    public function listData(AppInstructionSQL $sql, $values) {
        // Abrindo a conexão com o banco de dados
        $strConn = new TConnection();
        // Especificando o banco de dados que será utilizado
        $conn = $strConn->open("pg_app");
        try {
            // Abrindo uma transação
            $strConn->beginTransaction();

            // Preparando o comando SQL
            $stmp = $conn->prepare($sql->getSql());

            // Percorrendo os parametros
            for ($i = 0; $i < count($values); $i++) {
                $stmp->bindValue($values[$i]["attribute"], "'" . $values[$i]["values"] . "'");
            }
            // Executando a operação no banco de dados
            $stmp->execute();

            // Transformando o resultado em um array numerico com arrays associativos
            $resultSet = $stmp->fetchAll();

            // Comitando a operação
            $strConn->commit();

            // Retornando consulta
            return $resultSet;
        } catch (\PDOException $exc) {
            // Cancelando a transação com o banco de dados
            $strConn->rollback();
            $msg[] = "<strong>Código:</strong> " . $exc->getCode();
            $msg[] = "<strong>Arquivo:</strong> " . $exc->getFile();
            $msg[] = "<strong>Linha:</strong> " . $exc->getLine();
            $msg[] = "<strong>Mensagem:</strong> " . $exc->getMessage();
            // Retornando o erro caso exista
            return $msg;
        }
    }

    public function select(AppInstructionSQL $sql, $values) {
        // Abrindo a conexão com o banco de dados
        $strConn = new TConnection();
        // Especificando o banco de dados que será utilizado
        $conn = $strConn->open("pg_app");
        try {
            // Abrindo uma transação
            $strConn->beginTransaction();

            // Preparando o comando SQL
            $stmp = $conn->prepare($sql->getSql());

            // Percorrendo os parametros
            for ($i = 0; $i < count($values); $i++) {
                $stmp->bindValue($values[$i]["attribute"], "'" . $values[$i]["values"] . "'");
            }
            // Executando a operação no banco de dados
            $stmp->execute();

            // Transformando o resultado em um array associativo
            $resultSet = $stmp->fetch(\PDO::FETCH_ASSOC);

            // Comitando a operação
            $strConn->commit();

            // Retornando consulta
            return $resultSet;
        } catch (\PDOException $exc) {
            // Cancelando a transação com o banco de dados
            $strConn->rollback();
            $msg[] = "<strong>Código:</strong> " . $exc->getCode();
            $msg[] = "<strong>Arquivo:</strong> " . $exc->getFile();
            $msg[] = "<strong>Linha:</strong> " . $exc->getLine();
            $msg[] = "<strong>Mensagem:</strong> " . $exc->getMessage();
            // Retornando o erro caso exista
            return $msg;
        }
    }

    public function delete(AppInstructionSQL $sql, $values) {
        return $this->update($sql, $values);
    }

}
