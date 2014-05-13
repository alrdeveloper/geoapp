<?php

namespace application\lib;

class AppLog {

    /**
     * Responsavel por criar uma mensagem de log
     * @param type $mensagem
     */
    public static function log($mensagem) {
        $file = AppConfig::isLogDirectory() . "log.txt";
        $recurso = fopen($file, "a+");
        fwrite($recurso, date("Y-m-d H:i:s"));
        fwrite($recurso, $mensagem);
        fclose($recurso);
    }

    /**
     * Responsavel por armazenar mensagens de erro no log
     * @param type $error
     */
    public static function error($error) {
        self::log($error);
    }

}
