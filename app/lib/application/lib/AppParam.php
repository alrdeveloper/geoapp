<?php

namespace application\lib;

class AppParam {

    function __construct($values) {
        $this->setKey($values);
    }

    private $key, $values;

    public function getKey() {
        return $this->key;
    }

    public function setKey($key) {
        $this->key = array_keys($key);
    }

    public function getValues() {
        return $this->values;
    }

    public function setValues($values) {
        $this->values = $this->tratarArray($values);
    }

    /**
     * tratarArray retorna array para operações usando PDO
     * @return array
     */
    final function tratarArray($values) {
        if (is_array($values)) {
            $keys = array_keys($values);
            for ($i = 0; $i < count($keys); $i++) {
                $result[$i]["attribute"] = ":" . $keys[$i];
                $result[$i]["values"] = $values[$keys[$i]];
            }
        } else {
            $result = false;
        }
        return $result;
    }

}
