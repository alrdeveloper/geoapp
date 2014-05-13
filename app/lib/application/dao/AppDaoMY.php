<?php

namespace application\dao;

use application\lib\AppParam;

/**
 * Description of TTransaction
 * Classe responsavel por prover os metodos necessarios para manipular transacoes
 * @author allan roberto
 */
class AppDaoMY implements IDao
{

	public function insert(AppInstructionSQL $sql, $values)
	{
		// Abrindo a conexão com o banco de dados
		$strConn = new TConnection();
		// Especificando o banco de dados que ser? utilizado
		$conn = $strConn->open("my_app");
		try
		{
			// Abrindo uma transação
			$strConn->beginTransaction();
			
			// Preparando o comando SQL
			$stmp = $conn->prepare($sql->getSql());
			// Percorrendo os parametros
			for($i = 0; $i < count($values); $i++)
			{
				$stmp->bindValue($values[$i]["attribute"], $values[$i]["values"]);
			}
			// Executando a operação no banco de dados
			$stmp->execute();
			
			// Recuperando o id da linha cadastrada no banco de dados
			$result = $conn->lastInsertId();
			
			// Comitando a operação
			$strConn->commit();
			
			// Retornando valor da transação
			return $result;
		}
		catch (\PDOException $exc)
		{
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

	public function update(AppInstructionSQL $sql, $values)
	{
		// Abrindo a conexão com o banco de dados
		$strConn = new TConnection();
		// Especificando o banco de dados que ser? utilizado
		$conn = $strConn->open("my_app");
		try
		{
			// Abrindo uma transação
			$strConn->beginTransaction();
			
			// Preparando o comando SQL
			$stmp = $conn->prepare($sql->getSql());
			
			// Percorrendo os parametros
			for($i = 0; $i < count($values); $i++)
			{
				$stmp->bindValue($values[$i]["attribute"], $values[$i]["values"]);
			}
			// Executando a operação no banco de dados
			$stmp->execute();
			
			// Retorna a quantidade de registros afetados
			$result = $stmp->rowCount();
			
			// Comitando a operação
			$strConn->commit();
			
			// Retornando valor da transação
			return $result;
		}
		catch (\PDOException $exc)
		{
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

	public function countListData(AppInstructionSQL $sql, $values)
	{
		// TODO: Auto-generated method stub
	}

	public function listData(AppInstructionSQL $sql, $values, $comparer)
	{
		// Abrindo a conexão com o banco de dados
		$strConn = new TConnection();
		// Especificando o banco de dados que ser? utilizado
		$conn = $strConn->open("my_app");
		try
		{
			// Abrindo uma transação
			$strConn->beginTransaction();
			
			// Preparando o comando SQL
			$stmp = $conn->prepare($sql);
			
			// Percorrendo os parametros
			for($i = 0; $i < count($values); $i++)
			{
				$stmp->bindValue($values[$i]["attribute"], "{$values[$i]["values"]}");
			}
			
			// Executando a operação no banco de dados
			$stmp->execute();
			
			// Transformando o resultado em um array numerico com arrays associativos
			$resultSet = $stmp->fetchAll();
			
			// Comitando a operação
			$strConn->commit();
			
			// Retornando consulta
			return $resultSet;
		}
		catch (\PDOException $exc)
		{
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
	
	public function listDataBySql($sql)
	{
		// Abrindo a conexão com o banco de dados
		$strConn = new TConnection();
		// Especificando o banco de dados que ser? utilizado
		$conn = $strConn->open("my_app");
		try
		{
			// Abrindo uma transação
			$strConn->beginTransaction();
				
			// Preparando o comando SQL
			$smtp = $conn->prepare($sql);
			
			// Executando a operação no banco de dados
			$smtp->execute();
			
			// Transformando o resultado em um array numerico com arrays associativos
			$resultSet = $smtp->fetchAll();
				
			// Comitando a operação
			$strConn->commit();
				
			// Retornando consulta
			return $resultSet;
		}
		catch (\PDOException $exc)
		{
		// Cancelando a transação com o banco de dados
			$strConn->rollback();
			$msg[] = "<strong>Código:</strong> " . $exc->getCode();
			$msg[] = "<strong>Arquivo:</strong> " . $exc->getFile();
			$msg[] = "<strong>Linha:</strong> " . $exc->getLine();
			$msg[] = "<strong>Mensagem:</strong> " . $exc->getMessage();
			// Retornando o erro caso exista
				
			var_dump($msg);
				
			return $msg;
		}
	}

	public function selectBySql($sql)
	{
		// Abrindo a conexão com o banco de dados
		$strConn = new TConnection();
		// Especificando o banco de dados que ser? utilizado
		$conn = $strConn->open("my_app");
		try
		{
			// Abrindo uma transação
			$strConn->beginTransaction();
				
			// Preparando o comando SQL
			$smtp = $conn->prepare($sql);
				
			// Executando a operação no banco de dados
			$smtp->execute();
				
			// Transformando o resultado em um array associativo
			$resultSet = $smtp->fetch(\PDO::FETCH_ASSOC);
				
			// Comitando a operação
			$strConn->commit();
				
			// Retornando consulta
			return $resultSet;
		}
		catch (\PDOException $exc)
		{
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
	
	public function select(AppInstructionSQL $sql, $values)
	{
		// Abrindo a conexão com o banco de dados
		$strConn = new TConnection();
		// Especificando o banco de dados que ser? utilizado
		$conn = $strConn->open("my_app");
		try
		{
			// Abrindo uma transação
			$strConn->beginTransaction();
			
			// Preparando o comando SQL
			$stmp = $conn->prepare($sql->getSql());
			
			// Preparando valores para consulta
			$param = new AppParam($values);
			$param->setValues($values);
			$values = $param->getValues();
			
			// Percorrendo os parametros
			for($i = 0; $i < count($values); $i++)
			{
				$stmp->bindValue($values[$i]["attribute"], "{$values[$i]['values']}");
			}
			// Executando a operação no banco de dados
			$stmp->execute();
			
			// Transformando o resultado em um array associativo
			$resultSet = $stmp->fetch(\PDO::FETCH_ASSOC);
			
			// Comitando a operação
			$strConn->commit();
			
			// Retornando consulta
			return $resultSet;
		}
		catch (\PDOException $exc)
		{
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

	public function delete(AppInstructionSQL $sql, $values)
	{
		return $this->update($sql, $values);
	}

	public function returnParam($attrib, $values)
	{
		switch ($attrib)
		{
			case "Comeca Com" :
				$result = "%" . $values;
				break;
			case "Termina Com" :
				$result = $values . "%";
				break;
			case "Contem" :
				$result = "%" . $values . "%";
				break;
			case "Nao Contem" :
				$result = "%" . $values . "%";
				break;
			default :
				$result = $values;
				break;
		}
		return trim($result);
	}

	function tratarValores($values)
	{
		unset($values["attribute_order"]);
		unset($values["order"]);
		unset($values["quantidade"]);
		unset($values["submit"]);
		
		$comparer = $values["comparer"];
		
		if (empty($values["param"]))
		{
			unset($values["attribute"]);
			unset($values["comparer"]);
		}
		else
		{
			$consult[0]["attribute"] = ":" . $values["attribute"];
			$consult[0]["values"] = $this->returnParam(is_array($comparer) ? $comparer[0] : $comparer, $values["param"]);
		}
		unset($values["param"]);
		unset($values["attribute"]);
		unset($values["comparer"]);
		
		$keys = array_keys($values);
		if (!empty($keys))
		{
			$j = count($consult);
			for($i = 0; $i < count($keys); $i++)
			{
				$consult[$i + $j]["attribute"] = ":" . $keys[$i];
				$consult[$i + $j]["values"] = $this->returnParam(is_array($comparer) ? $comparer[$i + $j] : "Igual", $values[$keys[$i]]);
			}
		}
		
		return $consult;
	}

}
?>