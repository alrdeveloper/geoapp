<?php

namespace application\lib;

/**
 * Description of AppCookie
 * Classe para controlar cookie
 * @author home
 */
class AppCookie {

    /**
     * Método setCookie()
     * Responsável por armazenar valor dentro de uma sessão
     * @param type $property    =   Chave
     * @param type $value       =   Valor
     */
    public function setCookie($property, $value) {
        // Guarda o cookie por 3 dias
        setcookie($property, $value, time() + (3 * 24 * 3600));
    }

    /**
     * Método getCookie()
     * Retorna um valor dentro da sessão
     * @param type $property = nome da variável dentro da sessão
     * @return type - valor armazenado na sessão
     */
    public function getCookie($property) {
        return $_COOKIE[$property];
    }

    /**
     * Método freeCookie()
     * Limpa os dados da sessão
     */
    public function freeCookie() {
        $keys = array_keys($_COOKIE);
        foreach ($keys as $key) {
            unset($_COOKIE[$key]);
            setcookie($key, NULL, -1);
        }
        return $_COOKIE;
    }

}
