<?php

namespace application\lib;

class AppSession {

    /**
     * setSession() atribui um valor dentro de uma sess�o
     * @param $property = Chave
     * @param type $value = Valor
     */
    public function setSession($property, $value) {
        $_SESSION[$property] = $value;
    }

    /**
     * getSession() retorna um valor dentro da sess�o
     * @param $property = nome da vari�vel dentro da sess�o
     * @return array - valor armazenado na sess�o
     */
    public function getSession($property) {
        return $_SESSION[$property];
    }

    /**
     * freeSession()
     * Limpa os dados da sess�o
     */
    public function freeSession() {
        $keys = array_keys($_SESSION);
        foreach ($keys as $key) {
            unset($_SESSION[$key]);
        }
    }

}
