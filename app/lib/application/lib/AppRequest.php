<?php

namespace application\lib;

/**
 * M�todo AppRequest
 * Respons�vel por tratar os dados enviados pelo servidor
 * @author Allan Roberto
 */
class AppRequest {

    private $methodGet;
    private $methodPost;
    private $methodRequest;

    function __construct() {
        $this->setMethodGet($_GET);
        $this->setMethodPost($_POST);
        $this->setMethodRequest($_REQUEST);
    }

    /**
     * getMethodGet
     * @return array com m�todo $_GET
     */
    public function getMethodGet() {
        return $this->methodGet;
    }

    /**
     * setMethodGet atribui um valor a vari�vel $methodGet
     * @param $methodGet        	
     */
    public function setMethodGet($methodGet) {
        $this->methodGet = $this->tratarMethod($methodGet);
    }

    /**
     * getMethodPost
     * @return array com m�todo $_POST
     */
    public function getMethodPost() {
        return $this->methodPost;
    }

    /**
     * setMethodPost atribui um valor a vari�vel $methodPost
     * @param $methodPost        	
     */
    public function setMethodPost($methodPost) {
        $this->methodPost = $this->tratarMethod($methodPost);
    }

    /**
     * getMethodRequest
     * @return array com m�todo $_REQUEST
     */
    public function getMethodRequest() {
        return $this->methodRequest;
    }

    /**
     * setMethodRequest atribuir um valor a vari�vel $methodRequest
     * @param $methodRequest        	
     */
    public function setMethodRequest($methodRequest) {
        $this->methodRequest = $this->tratarMethod($methodRequest);
    }

    /**
     * tratarMethod respos�vel por tratar os dados antes de serem executados 
     * via comando SQL
     * @return array
     */
    public function tratarMethod() {
        if (is_array($values)) {
            $k = array_keys($values);
            for ($i = 0; $i < count($k); $i++) {
                if (is_array($values[$k[$i]])) {
                    for ($j = 0; $j < count($values[$k[$i]]); $j++) {
                        $values[$k[$i]][$j] = AppSystem::htmlByText($values[$k[$i]][$j]);
                    }
                } else {
                    $values[$k[$i]] = AppSystem::htmlByText($values[$k[$i]]);
                }
            }
        } else {
            return $values;
        }
    }

}
