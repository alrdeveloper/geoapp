<?php

namespace application\lib;

/**
 * Description of AppCookie
 * Classe para controlar cookie
 * @author home
 */
class AppCookie {

    /**
     * M�todo setCookie()
     * Respons�vel por armazenar valor dentro de uma sess�o
     * @param type $property    =   Chave
     * @param type $value       =   Valor
     */
    public function setCookie($property, $value) {
        // Guarda o cookie por 3 dias
        setcookie($property, $value, time() + (3 * 24 * 3600));
    }

    /**
     * M�todo getCookie()
     * Retorna um valor dentro da sess�o
     * @param type $property = nome da vari�vel dentro da sess�o
     * @return type - valor armazenado na sess�o
     */
    public function getCookie($property) {
        return $_COOKIE[$property];
    }

    /**
     * M�todo freeCookie()
     * Limpa os dados da sess�o
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
