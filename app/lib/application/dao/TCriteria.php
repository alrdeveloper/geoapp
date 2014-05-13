<?php

namespace application\dao;

/**
 * Description of TCriteria
 * Esta classe prov� uma interface utilizada para defini��o de crit�rios
 * @author allan roberto
 */
class TCriteria extends TExpression {

    private $expressions;   // Armazena a lista de express�es
    private $operators;     // Armazena a lista de operadores
    private $properties;    // Propriedades do crit�rio

    /**
     * M�todo __contruct()
     */
    function __construct() {
        $this->expressions = array();
        $this->operators = array();
    }

    /**
     * M�todo add()
     * Adiciona uma express�o ao crit�rio
     * @param \application\dao\TExpression $expressions = Objeto TExpression
     * @param type $operator = operador l�gico de compara��o
     */
    function add(TExpression $expressions, $operator = self::AND_OPERATOR) {
        // Na primeira vez que adicionamos um crit�rio n�o � necess�rio um operador
        if (empty($this->expressions)) {
            $operator = null;
        }

        // Agrega o resultado da express�o � lista de express�es
        $this->expressions[] = $expressions;
        $this->operators[] = $operator;
    }

    /**
     * M�todo dump()
     * Retorna a express�o final
     */
    public function dump() {
        // Concatena a lista de express�es
        if (is_array($this->expressions)) {
            if (count($this->expressions) > 0) {
                $result = '';
                foreach ($this->expressions as $i => $expression) {
                    $operator = $this->operators[$i];
                    // Concatena o operador com a respectiva express�o
                    $result .= $operator . $expression->dump() . ' ';
                }
                $result = trim($result);
                return "({$result})";
            }
        }
    }

    /**
     * M�todo setProperty()
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
     * M�todo getProperty()
     * Retorna o valor de uma propriedade
     * @param $property = valor
     */
    public function getProperty($property) {
        if (isset($this->properties[$property])) {
            return $this->properties[$property];
        }
    }

}
