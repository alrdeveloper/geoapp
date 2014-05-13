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
	 * Função getUrl
	 * Retorna a variável $url
	 * @return $url
	 */
	final public function getUrl()
	{
		return $this->url;
	}

	/**
	 * Função setUrl
	 * Recebendo a URL
	 * @param $url
	 */
	final public function setUrl($url)
	{
		$this->url = $url;
	}

	/**
	 * Função getParam
	 * Retorna a variável $param
	 * @return $param
	 */
	final public function getParam()
	{
		return $this->param;
	}

	/**
	 * Função setParam
	 * Tratando e atribuindo valor a variável $param
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
		// Atribuindo valor para mo método get
		$this->setMethodRoute($request);
		$this->param = $var;
	}

	/**
	 * Função getMethodGet
	 * Retorna a variável $methodGet
	 * @return $methodGet
	 */
	final public function getMethodGet()
	{
		return $this->methodGet;
	}

	/**
	 * Função setMethodGet
	 * Tratar os dados que serão utilizados através do request
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
	 * Função getMethodGet
	 * Retorna a variável $methodGet
	 * @return $methodGet
	 */
	final public function getMethodRoute()
	{
		return $this->methodRoute;
	}

	/**
	 * Função setMethodRoute
	 * Tratar os dados que serão utilizados através do request
	 * @param $methodRoute
	 */
	final public function setMethodRoute($methodRoute)
	{
		// Tratar o request
		$this->methodRoute = AppSystem::tratarRequisicao($methodRoute);
	}

	/**
	 * Função getMethodPost
	 * Retorna a variável $methodPost
	 * @return $methodPost
	 */
	public function getMethodPost()
	{
		return $this->methodPost;
	}

	/**
	 * Função setMethodPost
	 * Tratar os dados que serão utilizados pelo método $_POST
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
	 * Função getMethodFile
	 * Retorna a variável $methodFile
	 * @return $methodFile
	 */
	final public function getMethodFile()
	{
		return $this->methodFile;
	}

	/**
	 * Função setMethodPost
	 * Tratar os dados que serão utilizados pelo método $_FILE
	 * @param $methodPost
	 */
	final public function setMethodFile($methodFile)
	{
		$this->methodFile = $methodFile;
	}

	/**
	 * Gatilho para execução do controlador
	 * @param $url
	 * @param $methodPost
	 */
	final function main($url, $methodPost, $methodGet)
	{
		
		// Atribui valor para o método url
		$this->setUrl($url);
		// Trata os valores considerados parametros e request
		$this->setParam($url);
		// Trata os valores considerados post
		$this->setMethodPost($methodPost);
		// Trata os valores considerados get
		$this->setMethodGet($methodGet);
		// Redireciona para o módulo desejado
		$this->routeApplication();
	}

	/**
	 * Função principalAction
	 * Responsável por listar/pesquisar dados no banco
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
	 * Função getRegisterAction
	 * Responsável por buscar um registro de acordo com um critério pré-estabelecido
	 * @param $param - parametros para consultar registro ou gerar update
	 */
	function getRegisterAction($param)
	{
	}

	/**
	 * Função gerenciarAction
	 * Responsável por tratar um insert ou update no banco de dados
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
		
		// Prepara os valores para transação no banco de dados
		$entidade->setValues($post);
		
		// Executando comando no banco de dados
		$result = $entidade->executeOperation($cmd);
		
		// Limpando a variável post
		if (!is_array($result)) {
			unset($post);
		}
		
		return $result;
	}

	/**
	 * Função deleteRegisterAction
	 * Responsável pela exclusão de registros
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
	 * Função routeApplication
	 * Responsável por encaminhar a página solicitada ao módulo responsável
	 */
	final public function routeApplication()
	{
		$modulo = $this->methodRoute[0];
		$controller = $this->methodRoute[0] . "Controller";
		$action = $this->methodRoute[1] . "Action";
		$param = $this->param;
		// Caso não exista módulo redirecionar para a página inicial do sistema
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
			// Verifica se o método existe
			if (method_exists($class, $action))
			{
				$instance = new $class();
				$instance->$action($this->param, $this->methodGet, $this->methodPost);
			}
			else
			{
				$msg .= "\nClasse: " . $class . "\n";
				$msg .= "Função: " . $action . "\n";
				$msg .= "Mensagem: Função não localizada. \n";
				
				// Informa o erro ao arquivo de log
				AppLog::log($msg);
				// Redireciona para a página de erro
				$this->redirect(AppConfig::urlPath() . "erro.html");
			}
		}
		else
		{
			$msg .= "\nClasse: " . $class . "\n";
			$msg .= "Mensagem: Classe não localizada. \n";
			
			// Informa o erro ao arquivo de log
			AppLog::log($msg);
			// Redireciona para a página de erro
			$this->redirect(AppConfig::urlPath() . "erro.html");
		}
	}

	/**
	 * Função redirect
	 * Redirecionar a página para a url especificada
	 * @param $url
	 */
	final public function redirect($url)
	{
		header("Location: " . $url);
	}

	function tratarPost($values)
	{
		// Desabilitar Campos do formulário de pesquisa
		unset($values["attribute"]);
		unset($values["comparer"]);
		unset($values["param"]);
		unset($values["attribute_order"]);
		unset($values["order"]);
		unset($values["quantidade"]);
		
		return $values;
	}

}
