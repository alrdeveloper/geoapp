<?php

namespace application\dao;

interface IDao {

    /**
     * M�todo insert
     * M�todo para inserir valores no banco de dados
     * @param AppInstructionSQL $sql, 
     * @param unknown $values
     */
    public function insert(AppInstructionSQL $sql, $values);

    /**
     * M�todo update
     * M�todo para atualizar valores no banco de dados
     * @param AppInstructionSQL $sql, 
     * @param unknown $values
     */
    public function update(AppInstructionSQL $sql, $values);

    /**
     * M�todo countListaData
     * M�todo para contar registros consultados no banco de dados
     * @param AppInstructionSQL $sql, 
     * @param unknown $values
     */
    public function countListData(AppInstructionSQL $sql, $values);

    /**
     * M�todo listaData
     * M�todo para consultar registros no banco de dados
     * @param AppInstructionSQL $sql, 
     * @param unknown $values
     */
    public function listData(AppInstructionSQL $sql, $values, $comparer);

    /**
     * M�todo select
     * M�todo para consultar um registro no banco de dados
     * @param AppInstructionSQL $sql, 
     * @param unknown $values
     */
    public function select(AppInstructionSQL $sql, $values);

    /**
     * M�todo delete
     * M�todo para excluir valores no banco de dados
     * @param AppInstructionSQL $sql, 
     * @param unknown $values
     */
    public function delete(AppInstructionSQL $sql, $values);
}
