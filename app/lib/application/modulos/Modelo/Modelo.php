<?php

namespace application\modulos\Modelo;

use application\lib\AppEntidade;
use application\lib\IEntidade;
use application\dao\AppDaoMY;
use application\dao\AppInstructionSQL;
use application\lib\AppSystem;
use application\lib\AppDate;

class Modelo extends AppEntidade implements IEntidade
{
	private $nome, $cpf, $rg, $cnh, $data_nascimento, $data_cadastro;

	public function __construct($values) {
		parent::__construct($values);
	}

	public function __destruct() {
	}

	public function setId($id) {
		parent::setId($id);
	}

	public function executeOperation($cmd) {
		return parent::executeOperation($cmd);
	}

	public function setValues($values) {
		parent::setValues($values);
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getCpf() {
		return $this->cpf;
	}

	public function setCpf($cpf) {
		$this->cpf = !empty($cpf) ? ereg_replace('[^0-9]', '', $cpf) : null;
	}

	public function getRg() {
		return $this->rg;
	}

	public function setRg($rg) {
		$this->rg = $rg;
	}

	public function getCnh() {
		return $this->cnh;
	}

	public function setCnh($cnh) {
		$this->cnh = $cnh;
	}

	public function getDataNascimento() {
		return $this->data_nascimento;
	}

	public function setDataNascimento($data_nascimento) {
		$this->data_nascimento = empty($data_nascimento) ? null : AppDate::ajustarData($data_nascimento, "Y-m-d H:i:s");;
	}

	public function getDataCadastro() {
		return $this->data_cadastro;
	}

	public function setDataCadastro($data_cadastro) {
		$this->data_cadastro = empty($data_cadastro) ? date("Y-m-d H:i:s") : AppDate::ajustarData($data_cadastro, "Y-m-d H:i:s");
	}

	public function setStatus($status) {
		parent::setStatus($status);
	}

	public function validaUpdate() {
		return $this->validaInsert();
	}

	public function validaInsert() {
		$msg = array ();
		if (empty($this->nome))
		{
			$msg[] = "O campo Nome é obrigatório";
		}
		if (empty($this->cpf))
		{
			$msg[] = "O campo CPF é obrigatório";
		}
		if (AppSystem::validaCPF($this->cpf) == false)
		{
			$msg[] = "O CPF informado é inválido";
		}
		if (empty($this->rg))
		{
			$msg[] = "O campo RG é obrigatório";
		}
		if (empty($this->cnh))
		{
			$msg[] = "O campo CNH é obrigatório";
		}
		return $msg;
	}

	public function listData($cmd, $values) {
		$resultSet = parent::listData($cmd, $values);
		if (!empty($resultSet))
		{
			for ($i = 0; $i < count($resultSet); $i++)
			{
				$obj[$i] = new Modelo("");
				$obj[$i]->setId($resultSet[$i]["id"]);
				$obj[$i]->setIdentificador($resultSet[$i]["identificador"]);
				$obj[$i]->setNome($resultSet[$i]["nome"]);
				$obj[$i]->setCpf($resultSet[$i]["cpf"]);
				$obj[$i]->setRg($resultSet[$i]["rg"]);
				$obj[$i]->setCnh($resultSet[$i]["cnh"]);
				$obj[$i]->setDataNascimento($resultSet[$i]["data_nascimento"]);
				$obj[$i]->setDataCadastro($resultSet[$i]["data_cadastro"]);
				$obj[$i]->setStatus($resultSet[$i]["status"]);
			}
			return $obj;
		}
		else
		{
			return false;
		}
	}

	public function returnModelosForSelect() {
		$sql = "SELECT * FROM modelo WHERE status = 1 ORDER BY nome ASC";
		return parent::listDataBySql($sql);
	}

	public function loadData($cmd, $values) {
		$resultSet = parent::loadData($cmd, $values);
		if (!empty($resultSet))
		{
			$this->setId($resultSet["id"]);
			$this->setIdentificador($resultSet["identificador"]);
			$this->setNome($resultSet["nome"]);
			$this->setCpf($resultSet["cpf"]);
			$this->setRg($resultSet["rg"]);
			$this->setCnh($resultSet["cnh"]);
			$this->setDataNascimento($resultSet["data_nascimento"]);
			$this->setDataCadastro($resultSet["data_cadastro"]);
			$this->setStatus($resultSet["status"]);
		}
		else
		{
			return false;
		}
	}

	public function removeData($cmd, $values) {
		return parent::removeData($cmd, $values);
	}
}