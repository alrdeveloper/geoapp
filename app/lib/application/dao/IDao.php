<?php

namespace application\dao;

interface IDao {

    /**
     * Método insert
     * Método para inserir valores no banco de dados
     * @param AppInstructionSQL $sql, 
     * @param unknown $values
     */
    public function insert(AppInstructionSQL $sql, $values);

    /**
     * Método update
     * Método para atualizar valores no banco de dados
     * @param AppInstructionSQL $sql, 
     * @param unknown $values
     */
    public function update(AppInstructionSQL $sql, $values);

    /**
     * Método countListaData
     * Método para contar registros consultados no banco de dados
     * @param AppInstructionSQL $sql, 
     * @param unknown $values
     */
    public function countListData(AppInstructionSQL $sql, $values);

    /**
     * Método listaData
     * Método para consultar registros no banco de dados
     * @param AppInstructionSQL $sql, 
     * @param unknown $values
     */
    public function listData(AppInstructionSQL $sql, $values, $comparer);

    /**
     * Método select
     * Método para consultar um registro no banco de dados
     * @param AppInstructionSQL $sql, 
     * @param unknown $values
     */
    public function select(AppInstructionSQL $sql, $values);

    /**
     * Método delete
     * Método para excluir valores no banco de dados
     * @param AppInstructionSQL $sql, 
     * @param unknown $values
     */
    public function delete(AppInstructionSQL $sql, $values);
}
