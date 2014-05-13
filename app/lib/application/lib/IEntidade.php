<?php

namespace application\lib;

interface IEntidade
{
	public function __construct($values);
	
	public function setId($id);
	
	public function setStatus($status);
	
	public function executeOperation($cmd);
	
	public function removeData($cmd, $values);
	
	public function setValues($values);
	
	public function listData($cmd, $values);
	
	public function loadData($cmd, $values);
	
}