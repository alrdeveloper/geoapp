<?php

namespace application\lib;

class AppConfig {

    /**
     * typeServer retorna o tipo de servidor 
     * @return booleano
     */
    public static function typeServer() {
        //return true;
        return false;
    }

    public function isSmartyTemplate($modulo) {
        if (self::typeServer()) {
            return "/home/ubuntu/public_html/ibivirtual/app/lib/application/modulo/" . $modulo . "/template";
        } else {
            return "D:\\PHPProjects\\geoapp\\app\\lib\\application\\modulos\\" . $modulo . "\\template\\";
        }
    }

    /**
     * M�todo isSmartyTemplateEmail()
     * Fun��o para retornar o caminho do template para envio de e-mail
     * @param type $tpl - nome do template que ser� enviado
     * @return type - retorna
     */
    public static function isSmartyTemplateEmail($tpl) {
        if (self::typeServer()) {
            return "/home/ubuntu/public_html/ibivirtual/template/tpl/email/" . $tpl;
        } else {
            return "D:\\PHPProjects\\geoapp\\layout\\email\\" . $tpl;
        }
    }

    /**
     * M�todo isSmartyPath()
     * M�todo retorna o caminho da classe smarty
     * @return string - retorna uma strig
     */
    public static function isSmartyPath() {
        if (self::typeServer()) {
            return "/home/ubuntu/public_html/ibivirtual/vendor/smarty/smarty/libs/";
        } else {
            return "D:\\PHPProjects\\geoapp\\vendor\\smarty\\smarty\\libs\\";
        }
    }

    /**
     * M�todo isSmartyCompile()
     * Fun��o retorna o caminho do compile do smarty para templates compilados
     * @return string
     */
    public static function isSmartyCompile() {
        if (self::typeServer()) {
            return "/home/ubuntu/public_html/ibivirtual/vendor/smarty/smarty/libs/compile/";
        } else {
            return "D:\\PHPProjects\\geoapp\\vendor\\smarty\\smarty\\libs\\compile\\";
        }
    }

    /**
     * M�todo isSmartyConfig()
     * Fun��o retorna o caminho da pasta de configura��o do smarty
     * @return string
     */
    public static function isSmartyConfig() {
        if (self::typeServer()) {
            return "/home/ubuntu/public_html/ibivirtual/vendor/smarty/smarty/libs/config/";
        } else {
            return "D:\\PHPProjects\\geoapp\\vendor\\smarty\\smarty\\libs\\config\\";
        }
    }

    /**
     * M�todo isSmartyCache()
     * Fun��o retorna o caminho da pasta para armazenar o cache do smarty
     * @return string
     */
    public static function isSmartyCache() {
        if (self::typeServer()) {
            return "/home/ubuntu/public_html/ibivirtual/vendor/smarty/smarty/libs/cache/";
        } else {
            return "D:\\PHPProjects\\geoapp\\vendor\\smarty\\smarty\\libs\\cache\\";
        }
    }

    /**
     * isLogDirectory retorna o path para armazenamento de arquivo de log
     * @return string
     */
    public static function isLogDirectory() {
        if (self::typeServer()) {
            return "/home/ubuntu/public_html/ibivirtual/logs/";
        } else {
            return "D:\\PHPProjects\\geoapp\\logs\\";
        }
    }

    /**
     * urlPath retorna o patha da aplica��o
     * @return string
     */
    public static function urlPath() {
        return "/";
    }

    /**
     * pathFile retorna o path dos arquivos enviadas aos usu�rios
     * @return string
     */
    public static function pathFile() {
        if (self::typeServer()) {
            return "/home/ubuntu/public_html/ibivirtual/files/";
        } else {
            return "D:\\PHPProjects\\geoapp\\files\\";
        }
    }

    /**
     * pathImage retorna o path das imagens enviadas pelos usu�rios
     * @return string
     */
    public static function pathImage() {
        if (self::typeServer()) {
            return "/home/ubuntu/public_html/ibivirtual/images/";
        } else {
            return "D:\\PHPProjects\\geoapp\\images\\";
        }
    }

    /**
     * srcCss retorna o path da folha de estilos
     * @return type
     */
    public static function srcCss() {
        return self::urlPath() . "scripts/css/";
    }

    /**
     * srcImage retorna o path das imagens utilizadas no site
     * @return string
     */
    public static function srcImage() {
        return self::urlPath() . "scripts/css/img/";
    }

    /**
     * pathScript retorna o path arquivos javascript
     * @return string 
     */
    public static function srcScript() {
        return self::urlPath() . "scripts/js/";
    }

}
