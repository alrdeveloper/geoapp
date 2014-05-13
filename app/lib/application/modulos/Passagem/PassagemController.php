<?php

/*
 * To change this license header, choose License Headers in Project Properties. To change this template file, choose Tools | Templates and open the template in the editor.
 */
namespace application\modulos\Passagem;

use application\lib\AppController;
use application\dao\AppInstructionSQL;
use application\lib\AppPaginacao;
use application\dao\AppDaoMY;

class PassagemController extends AppController
{
	private $view, $sql;

	public function __construct()
	{
		$this->view = new PassagemView("Passagem");
		$this->sql = new AppInstructionSQL("passagem");
	}

	public function deleteAction($param)
	{
		$entidade = new Passagem();
		$result = parent::deleteAction($entidade, $this->sql, $param);
		if (! is_array($result))
		{
			$this->redirect("/Passagem/principal");
		}
	}

	public function viewAction($param)
	{
		$entidade = new Passagem();
		$resultSet = parent::viewAction($entidade, $this->sql, $param);
		$this->view->visualizar($resultSet);
	}

	public function gerenciarAction($param, $get, $post, $file)
	{
		// Preparar dados enviados antes de iniciar o crud
		$post = $this->tratarPost($post);
		
		$entidade = new Passagem();
		$listEntidade = $entidade->returnPassagemsForSelect();		
		if (! empty($param))
		{
			$entidade->setId($param[0]);
			$entidade->loadData($this->sql);
		}
		if (! empty($post["submit"]))
		{
			$result = parent::gerenciarAction($entidade, $this->sql, $param, $get, $post, $file);
		}
		$this->view->gerenciar($entidade, $result, $listEntidade);
	}

	public function principalAction($param, $get, $post)
	{
		$entidade = new Passagem("");
		
		if (! empty($get["pg"]))
		{
			$get["pg"] = $get["pg"] * $post["quantidade"];
		}
		// Condicional obrigatório
		$this->sql->setCondiction("status", $this->sql->getEnum()->igual(), 1);
		
		$resultSet = parent::principalAction($entidade, $this->sql, $get, $post);
		
		// Contando Registros
		$count = $entidade->returnCount($this->sql, $post);
		
		$path = "/Passagem/principal/";
		if (empty($post["param"]))
		{
			$linkBack = $path . "?attribute_order=" . $post["attribute_order"] . "&order=" . $post["order"];
		}
		else
		{
			$linkBack = $path . "?attribute=" . $post["attribute"] . "&comparer=" . $post["comparer"] . "&param=" . $post["param"] . "&attribute_order=" . $post["attribute_order"] . "&order=" . $post["order"];
		}
		
		$objPg = new AppPaginacao($post["quantidade"], $count, $get["pg"], $linkBack);
		
		$this->view->principal($resultSet, $post, $objPg);
	}

}