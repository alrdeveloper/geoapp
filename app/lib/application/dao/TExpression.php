<?php

namespace application\dao;

/**
 * Description of TExpression
 * Classe abstrata para gerenciar express�es
 * @author allan roberto
 */
abstract class TExpression {

    // Operadores L�gicos
    const AND_OPERATOR = 'AND ';
    const OR_OPERATOR = 'OR ';

    // Marca o m�todo dump como obrigat�rio
    abstract public function dump();
}
