<?php

namespace application\dao;

/**
 * Description of TConnection
 * Gerencia conex�es com bancos de dados atrav�s de arquivos de configura��o
 * @author allan roberto
 */
final class TConnection {

    /**
     * Vari�veis necess�rias para efetuar a conex�o com o banco de dados
     * @var type 
     */
    private $host;
    private $port;
    private $db;
    private $user;
    private $pwd;
    private $type;
    private $connDB;

    /**
     * M�todo __construct()
     * N�o existir�o inst�ncias de TConnection
     */
    public function __construct() {
        
    }

    /**
     * M�todo open()
     * Recebe o nome do banco de dados e instancia o objeto PDO correspondente
     * @param type $this->db = nome da configuracao para acessar o banco de dados
     */
    public function open($db) {
        // Verifica se existe arquivo de configura��o para este banco de dados
        if (file_exists("app.config/{$db}.ini")) {
            // Le o INI e retorna um array
            $db = parse_ini_file("app.config/{$db}.ini");
        } else {
            // Se n�o existir, lan�a um erro
            throw new \Exception("Arquivo '$db' n�o encontrado");
        }

        // Le as informacoes contidas no arquivo
        $this->user = isset($db["user"]) ? $db["user"] : NULL;
        $this->pwd = isset($db["pass"]) ? $db["pass"] : NULL;
        $this->db = isset($db["name"]) ? $db["name"] : NULL;
        $this->host = isset($db["host"]) ? $db["host"] : NULL;
        $this->type = isset($db["type"]) ? $db["type"] : NULL;
        $this->port = isset($db["port"]) ? $db["port"] : NULL;

        // Descobre qual o tipo (driver) de banco de dados a ser utilizado
        switch ($this->type) {
            case 'pgsql':
                $this->port = $this->port ? $this->port : '5432';
                $conn = new \PDO("pgsql:dbname={$this->db};user={$this->user};password={$this->pwd};host={$this->host};port={$this->port}");
                break;
            case 'mysql' :
                $this->connDB = new \PDO("mysql:host={$this->host};port={$this->port};dbname={$this->db}", $this->user, $this->pwd);
                break;
            case 'sqlite' :
                $this->connDB = new \PDO("sqlite:name={$this->db}");
                break;
            case 'ibase' :
                $this->connDB = new \PDO("firebird:dbname={$this->db};", $this->user, $this->pwd);
                break;
            case 'oci8' :
                $this->connDB = new \PDO("oci:dbname={$this->db};", $this->user, $this->pwd);
                break;
            case 'mssql' :
                $this->connDB = new \PDO("mssql:host={$this->host}, 1432; dbname={$this->db};", $this->user, $this->pwd);
                break;
        }
        // Define para que o PDO lance excecoes na ocorrencia de erros
        $this->connDB->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        // Retorna o objeto instanciado
        return $this->connDB;
    }

    /*
     * M�todo beginTransaction()
     * Abre uma transacao
     */

    public function beginTransaction() {
        if ($this->connDB) {
            // Inicia a transacao
            $this->connDB->beginTransaction();
        }
    }

    /**
     * M�todo commit()
     * Conclui a transacao no banco de dados
     */
    public function commit() {
        if ($this->connDB) {
            // Conclui a transacao
            $this->connDB->commit();
            // Fecha a conexao com o banco de dados
            $this->closeConnect();
        }
    }

    /**
     * M�todo rollback()
     * Cancela a transacao com o banco de dados
     */
    public function rollback() {
        if ($this->connDB) {
            // Cancela a transacao com o banco dedados
            $this->connDB->rollBack();
            // Fecha a conexao com o banco de dados
            $this->closeConnect();
        }
    }

    /**
     * M�todo para fechar a conexao com o banco de dados
     */
    public function closeConnect() {
        $this->connDB = null;
    }

    /**
     * M�todo lastInsertId 
     * @param type $sequence nome da sequ�ncia (oracle/postgresql/DB2)
     * @return type �ltimo id inserido em uma tabela
     */
    public function lastInsertId($sequence = null) {
        if ($this->connDB) {
            $result = $this->connDB->lastInsertId($sequence);
        }
        return $result;
    }

}
