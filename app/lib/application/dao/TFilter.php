<?php

namespace application\dao;

use application\lib\AppSystem;

/**
 * Description of TFilter
 * Classe para prover uma interface para definição de filtros de seleção
 * @author allan roberto
 */
class TFilter extends TExpression {

    private $variable;  // variável
    private $operator;  // operador
    private $value;     // valor

    /**
     * Método __construct()
     * Instancia um novo filtro
     * @param $variable = variável
     * @param $operator = operador (> , <)
     * @param $value = valor
     */

    function __construct($variable, $operator, $value) {
        // Armazena as propriedades
        $this->variable = $variable;
        $this->operator = $operator;
        // Transforma o valor de acordo com certas regras
        // Antes de atribuir à propriedade $this->value
        $this->value = $this->transform($value);
    }

    /**
     * Método transform()
     * Recebe um valo e faz as modificações necessárias para ele ser
     * interpretado pelo banco de dados
     * podendo ser um integer/string/booleano ou array
     * @param type $value = valor a ser transformado
     */
    private function transform($value) {
        // Caso seja um array
        if (is_array($value)) {
            // Percorrendo o array
            foreach ($value as $x) {
                // Se for um inteiro
                if (is_integer($x)) {
                    $foo[] = $x;
                }
                // Se for string adiciona aspas
                else if (is_string($x)) {
                    $foo[] = "'" . AppSystem::queryString(utf8_encode($x)) . "'";
                }
            }
            // Converte o array em uma string separada por ","
            $result = '(' . utf8_encode(implode(", ", $foo)) . ')';
        }
        // Caso o valor seja uma string
        else if (is_string($value)) {
            $result = "'" . utf8_encode($value) . "'";
        }
        // Caso o valor seja nulo
        else if (is_null($value)) {
            $result = 'NULL';
        }
        // Caso o valor seja booleano
        else if (is_bool($value)) {
            $result = $value ? 'TRUE' : 'FALSE';
        } else {
            $result = $value;
        }
        // Retorna o valor 
        return $result;
    }

    /**
     * Método dump()
     * Retorna o filtro em forma de expressão
     */
    public function dump() {
        // Concatena a expressão
        return "{$this->variable} {$this->operator} {$this->value}";
    }

}
