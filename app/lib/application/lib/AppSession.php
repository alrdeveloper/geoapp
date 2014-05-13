<?php

namespace application\lib;

class AppSession {

    /**
     * setSession() atribui um valor dentro de uma sessão
     * @param $property = Chave
     * @param type $value = Valor
     */
    public function setSession($property, $value) {
        $_SESSION[$property] = $value;
    }

    /**
     * getSession() retorna um valor dentro da sessão
     * @param $property = nome da variável dentro da sessão
     * @return array - valor armazenado na sessão
     */
    public function getSession($property) {
        return $_SESSION[$property];
    }

    /**
     * freeSession()
     * Limpa os dados da sessão
     */
    public function freeSession() {
        $keys = array_keys($_SESSION);
        foreach ($keys as $key) {
            unset($_SESSION[$key]);
        }
    }

}
