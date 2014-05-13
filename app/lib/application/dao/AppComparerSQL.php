<?php

namespace application\dao;

/**
 * Description of AppComparerSQL
 * Responsavel pela forma de comparacao de comandos sql
 * @author allan roberto
 */
class AppComparerSQL {

    /**
     * Retorna comparador igual
     * @return string
     */
    public function igual() {
        return "Igual";
    }

    /**
     * Retorna comparador diferente
     * @return string
     */
    public function diferente() {
        return "Diferente";
    }

    /**
     * Retorna consulta pelo termo inicial
     * @return string
     */
    public function comecaCom() {
        return "Começa Com";
    }

    /**
     * Retorna consulta pelo termo final
     * @return string
     */
    public function terminaCom() {
        return "Termina Com";
    }

    /**
     * Retorna consulta pelo termo
     * @return string
     */
    public function contem() {
        return "Contem";
    }

    /**
     * Retorna consulta que não contém o termo
     * @return string
     */
    public function naoContem() {
        return "Não Contém";
    }

    /**
     * Retorna comparador maior
     * @return string
     */
    public function maior() {
        return "Maior";
    }

    /**
     * Retorna comparador menor
     * @return string
     */
    public function menor() {
        return "Menor";
    }

    /**
     * Retorna comparador maior igual
     * @return string
     */
    public function maiorIgual() {
        return "Maior Igual";
    }

    /**
     * Retorna comparador menor igal
     * @return string
     */
    public function menorIgual() {
        return "Menor Igual";
    }

    /**
     * Retorna consulta entre termos
     * @return string
     */
    public function entre() {
        return "Entre";
    }

    public function listComparer() {
        $list = array();

        $list[0]["value"] = $this->igual();
        $list[1]["value"] = $this->diferente();
        $list[2]["value"] = $this->maior();
        $list[3]["value"] = $this->maiorIgual();
        $list[4]["value"] = $this->menor();
        $list[5]["value"] = $this->menorIgual();
        $list[6]["value"] = $this->contem();
        $list[7]["value"] = $this->naoContem();
        $list[8]["value"] = $this->comecaCom();
        $list[9]["value"] = $this->terminaCom();

        return $list;
    }

    /**
     * Retorna a comparação para comando sql
     * @param type $attribute - atributo para comparação
     * @param type $comparer - comparador da consulta
     * @param type $param - parametro do attribute
     * @return string - comando sql
     */
    public function getComparer($attribute, $comparer, $param) {
        switch ($comparer) {
            case $this->igual() :
                $sql = $attribute . " = '" . $param . "'";
                break;
            case $this->diferente() :
                $sql = $attribute . " <> '" . $param . "'";
                break;
            case $this->contem() :
                $sql = $attribute . " LIKE '%" . $param . "%'";
                break;
            case $this->comecaCom() :
                $sql = $attribute . " LIKE '" . $param . "%'";
                break;
            case $this->terminaCom() :
                $sql = $attribute . " LIKE '%" . $param . "'";
                break;
            case $this->naoContem() :
                $sql = $attribute . " NOT LIKE '%" . $param . "%'";
                break;
            case $this->maior() :
                $sql = $attribute . " > '" . $param . "'";
                break;
            case $this->maiorIgual() :
                $sql = $attribute . " >= '" . $param . "'";
                break;
            case $this->menor() :
                $sql = $attribute . " < '" . $param . "'";
                break;
            case $this->menorIgual() :
                $sql = $attribute . " <= '" . $param . "'";
                break;
        }
        return $sql;
    }

}
