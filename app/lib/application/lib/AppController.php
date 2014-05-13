<?php

namespace application\lib;

use application\dao\AppInstructionSQL;

class AppController
{
	protected $url;
	protected $param;
	protected $methodRoute;
	protected $methodGet;
	protected $methodPost;
	protected $methodFile;

	/**
	 * Fun��o getUrl
	 * Retorna a vari�vel $url
	 * @return $url
	 */
	final public function getUrl()
	{
		return $this->url;
	}

	/**
	 * Fun��o setUrl
	 * Recebendo a URL
	 * @param $url
	 */
	final public function setUrl($url)
	{
		$this->url = $url;
	}

	/**
	 * Fun��o getParam
	 * Retorna a vari�vel $param
	 * @return $param
	 */
	final public function getParam()
	{
		return $this->param;
	}

	/**
	 * Fun��o setParam
	 * Tratando e atribuindo valor a vari�vel $param
	 * @param $param - dados vindos via url
	 */
	final public function setParam($param)
	{
		$param = explode("/", trim($this->url));
		
		if (! empty($param))
		{
			for($i = 0; $i < count($param); $i++)
			{
				if (! empty($param[$i]))
				{
					if (count($request) < 2)
					{
						$request[] = $param[$i];
					}
					else
					{
						$var[] = $param[$i];
					}
				}
			}
		}
		// Atribuindo valor para mo m�todo get
		$this->setMethodRoute($request);
		$this->param = $var;
	}

	/**
	 * Fun��o getMethodGet
	 * Retorna a vari�vel $methodGet
	 * @return $methodGet
	 */
	final public function getMethodGet()
	{
		return $this->methodGet;
	}

	/**
	 * Fun��o setMethodGet
	 * Tratar os dados que ser�o utilizados atrav�s do request
	 * @param $methodGet
	 */
	final public function setMethodGet($methodGet)
	{
		// Tratar o request$
		if (empty($methodGet) || $this->methodPost["submit"] == 1)
		{
			$methodGet["pg"] = 0;
		}
		$this->methodGet = AppSystem::tratarRequisicao($methodGet);
	}

	/**
	 * Fun��o getMethodGet
	 * Retorna a vari�vel $methodGet
	 * @return $methodGet
	 */
	final public function getMethodRoute()
	{
		return $this->methodRoute;
	}

	/**
	 * Fun��o setMethodRoute
	 * Tratar os dados que ser�o utilizados atrav�s do request
	 * @param $methodRoute
	 */
	final public function setMethodRoute($methodRoute)
	{
		// Tratar o request
		$this->methodRoute = AppSystem::tratarRequisicao($methodRoute);
	}

	/**
	 * Fun��o getMethodPost
	 * Retorna a vari�vel $methodPost
	 * @return $methodPost
	 */
	public function getMethodPost()
	{
		return $this->methodPost;
	}

	/**
	 * Fun��o setMethodPost
	 * Tratar os dados que ser�o utilizados pelo m�todo $_POST
	 * @param $methodPost
	 */
	public function setMethodPost($methodPost)
	{
		$methodPost["attribute"] = empty($methodPost["attribute"]) ? "id" : $methodPost["attribute"];
		$methodPost["comparer"] = empty($methodPost["comparer"]) ? "Contem" : $methodPost["comparer"];
		$methodPost["attribute_order"] = empty($methodPost["attribute_order"]) ? $methodPost["attribute"] : $methodPost["attribute_order"];
		$methodPost["order"] = empty($methodPost["order"]) ? 1 : $methodPost["order"];
		$methodPost["quantidade"] = empty($methodPost["quantidade"]) ? 10 : $methodPost["quantidade"];
		$methodPost["status"] = empty($methodPost["status"]) ? 1 : $methodPost["status"];
		$methodPost["submit"] = empty($methodPost["submit"]) ? 0 : $methodPost["submit"];
		
		$this->methodPost = AppSystem::tratarRequisicao($methodPost);
	}

	/**
	 * Fun��o getMethodFile
	 * Retorna a vari�vel $methodFile
	 * @return $methodFile
	 */
	final public function getMethodFile()
	{
		return $this->methodFile;
	}

	/**
	 * Fun��o setMethodPost
	 * Tratar os dados que ser�o utilizados pelo m�todo $_FILE
	 * @param $methodPost
	 */
	final public function setMethodFile($methodFile)
	{
		$this->methodFile = $methodFile;
	}

	/**
	 * Gatilho para execu��o do controlador
	 * @param $url
	 * @param $methodPost
	 */
	final function main($url, $methodPost, $methodGet)
	{
		
		// Atribui valor para o m�todo url
		$this->setUrl($url);
		// Trata os valores considerados parametros e request
		$this->setParam($url);
		// Trata os valores considerados post
		$this->setMethodPost($methodPost);
		// Trata os valores considerados get
		$this->setMethodGet($methodGet);
		// Redireciona para o m�dulo desejado
		$this->routeApplication();
	}

	/**
	 * Fun��o principalAction
	 * Respons�vel por listar/pesquisar dados no banco
	 * @param $param
	 * @param $post
	 */
	function principalAction(IEntidade $entidade, AppInstructionSQL $cmd, $get, $post, $param)
	{
		$cmd->setColumn("*");
		
		if (!empty($post["param"])) {
			$cmd->setCondiction($post["attribute"], empty($post["comparer"]) ? "Contem" : $post["comparer"], 1);
		}
		
		$cmd->instructionSelectSQL($post["attribute_order"], $post["order"], $post["quantidade"], $get["pg"]);
		
		$resultSet = $entidade->listData($cmd, $post);
		
		return $resultSet;
	}

	public function viewAction(IEntidade $entidade, AppInstructionSQL $cmd, $param)
	{
		$entidade->setId($param[0]);
		$entidade->loadData($cmd);
		
		return $entidade;
	}

	/**
	 * Fun��o getRegisterAction
	 * Respons�vel por buscar um registro de acordo com um crit�rio pr�-estabelecido
	 * @param $param - parametros para consultar registro ou gerar update
	 */
	function getRegisterAction($param)
	{
	}

	/**
	 * Fun��o gerenciarAction
	 * Respons�vel por tratar um insert ou update no banco de dados
	 * @param $param - parametros para consultar registro ou gerar update
	 * @param $post - dados a serem enviados para o servidor
	 * @param $file - arquivo para ser salvo no servidor
	 */
	function gerenciarAction(IEntidade $entidade, AppInstructionSQL $cmd, $param, $get, $post, $file)
	{
		if (empty($post["id"]))
		{
			unset($post["id"]);
		}
		// Removendo o valor 'submit' da lista post
		unset($post["submit"]);
		
		// Passando os valores para a classe AppInstructionSQL para montar o comando sql
		$cmd->setParam($post);
		
		// Prepara os valores para transa��o no banco de dados
		$entidade->setValues($post);
		
		// Executando comando no banco de dados
		$result = $entidade->executeOperation($cmd);
		
		// Limpando a vari�vel post
		if (!is_array($result)) {
			unset($post);
		}
		
		return $result;
	}

	/**
	 * Fun��o deleteRegisterAction
	 * Respons�vel pela exclus�o de registros
	 * @param $param - parametros para consultar registro ou gerar update
	 */
	function deleteAction(IEntidade $entidade, AppInstructionSQL $cmd, $param)
	{
		$values["id"] = $param[0];
		$values["status"] = 2;
		
		$cmd->setParam($values);
		
		$entidade->setValues($values);
		
		$result = $entidade->removeData($cmd, $values);
	}

	/**
	 * Fun��o routeApplication
	 * Respons�vel por encaminhar a p�gina solicitada ao m�dulo respons�vel
	 */
	final public function routeApplication()
	{
		$modulo = $this->methodRoute[0];
		$controller = $this->methodRoute[0] . "Controller";
		$action = $this->methodRoute[1] . "Action";
		$param = $this->param;
		// Caso n�o exista m�dulo redirecionar para a p�gina inicial do sistema
		if (empty($modulo))
		{
			$modulo = "Home";
			$controller = "HomeController";
			$action = "principalAction";
		}
		$path = "\\application\\modulos\\" . $modulo . "\\";
		$class = $path . $controller;
		
		// Verifica se a classe existe
		if (class_exists($class))
		{
			// Verifica se o m�todo existe
			if (method_exists($class, $action))
			{
				$instance = new $class();
				$instance->$action($this->param, $this->methodGet, $this->methodPost);
			}
			else
			{
				$msg .= "\nClasse: " . $class . "\n";
				$msg .= "Fun��o: " . $action . "\n";
				$msg .= "Mensagem: Fun��o n�o localizada. \n";
				
				// Informa o erro ao arquivo de log
				AppLog::log($msg);
				// Redireciona para a p�gina de erro
				$this->redirect(AppConfig::urlPath() . "erro.html");
			}
		}
		else
		{
			$msg .= "\nClasse: " . $class . "\n";
			$msg .= "Mensagem: Classe n�o localizada. \n";
			
			// Informa o erro ao arquivo de log
			AppLog::log($msg);
			// Redireciona para a p�gina de erro
			$this->redirect(AppConfig::urlPath() . "erro.html");
		}
	}

	/**
	 * Fun��o redirect
	 * Redirecionar a p�gina para a url especificada
	 * @param $url
	 */
	final public function redirect($url)
	{
		header("Location: " . $url);
	}

	function tratarPost($values)
	{
		// Desabilitar Campos do formul�rio de pesquisa
		unset($values["attribute"]);
		unset($values["comparer"]);
		unset($values["param"]);
		unset($values["attribute_order"]);
		unset($values["order"]);
		unset($values["quantidade"]);
		
		return $values;
	}

}
