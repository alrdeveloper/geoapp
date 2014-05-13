<?php

namespace application\dao;

/**
 * Description of TCriteria
 * Esta classe provê uma interface utilizada para definição de critérios
 * @author allan roberto
 */
class TCriteria extends TExpression {

    private $expressions;   // Armazena a lista de expressões
    private $operators;     // Armazena a lista de operadores
    private $properties;    // Propriedades do critério

    /**
     * Método __contruct()
     */
    function __construct() {
        $this->expressions = array();
        $this->operators = array();
    }

    /**
     * Método add()
     * Adiciona uma expressão ao critério
     * @param \application\dao\TExpression $expressions = Objeto TExpression
     * @param type $operator = operador lógico de comparação
     */
    function add(TExpression $expressions, $operator = self::AND_OPERATOR) {
        // Na primeira vez que adicionamos um critério não é necessário um operador
        if (empty($this->expressions)) {
            $operator = null;
        }

        // Agrega o resultado da expressão à lista de expressões
        $this->expressions[] = $expressions;
        $this->operators[] = $operator;
    }

    /**
     * Método dump()
     * Retorna a expressão final
     */
    public function dump() {
        // Concatena a lista de expressões
        if (is_array($this->expressions)) {
            if (count($this->expressions) > 0) {
                $result = '';
                foreach ($this->expressions as $i => $expression) {
                    $operator = $this->operators[$i];
                    // Concatena o operador com a respectiva expressão
                    $result .= $operator . $expression->dump() . ' ';
                }
                $result = trim($result);
                return "({$result})";
            }
        }
    }

    /**
     * Método setProperty()
     * Define o valor de uma propriedade
     * @param type $property    = propriedade
     * @param type $value       = valor
     */
    public function setProperty($property, $value) {
        if (isset($value)) {
            $this->properties[$property] = $value;
        } else {
            $this->properties[$property] = NULL;
        }
    }

    /**
     * Método getProperty()
     * Retorna o valor de uma propriedade
     * @param $property = valor
     */
    public function getProperty($property) {
        if (isset($this->properties[$property])) {
            return $this->properties[$property];
        }
    }

}
