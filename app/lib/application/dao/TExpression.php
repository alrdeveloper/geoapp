<?php

namespace application\dao;

/**
 * Description of TExpression
 * Classe abstrata para gerenciar expressões
 * @author allan roberto
 */
abstract class TExpression {

    // Operadores Lógicos
    const AND_OPERATOR = 'AND ';
    const OR_OPERATOR = 'OR ';

    // Marca o método dump como obrigatório
    abstract public function dump();
}
