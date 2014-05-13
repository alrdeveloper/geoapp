<?php

/*
 * To change this license header, choose License Headers in Project Properties. To change this template file, choose Tools | Templates and open the template in the editor.
 */

namespace application\lib;

use \Smarty as Smarty;
use application\dao\EnumInstructionSQL;
use application\lib\AppNavegacao;

define('SMARTY_DIR', AppConfig::isSmartyPath());

require_once (SMARTY_DIR . 'Smarty.class.php');

/**
 * Description of AppView
 * Classe Pai para camada de visualização
 * @author home
 */
class AppView {

    private $smarty;
    protected $head, $title, $nav, $modulo;

    public function __construct($modulo) {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(AppConfig::isSmartyTemplate($modulo));
        $this->smarty->setCompileDir(AppConfig::isSmartyCompile());
        $this->smarty->setConfigDir(AppConfig::isSmartyConfig());
        $this->smarty->setCacheDir(AppConfig::isSmartyCache());
        $this->nav = new AppNavegacao();
        $this->modulo = $modulo;
    }

    /**
     * Carrega automaticamente os vetores nas páginas
     * que assinam este método
     * @param type $obj - vetor referente ao model
     * @param type $msg - mensagem para exibiçãona tela
     */
    public function assignDefault($obj, $msg) {
        $this->assign("Obj", $obj);
        $this->assign("Msg", $msg);
    }

    public function principal($post, $modulo, AppPaginacao $pg) {
    	$this->loadScript();
    	
    	$this->assign("Qtde", $post["quantidade"]);
    	$this->assign("Param", $post["param"]);
    	$this->assign("Attribute", $post["attribute"]);
    	$this->assign("Comparer", $post["comparer"]);
    	$this->assign("AttributeOrder", $post["attribute_order"]);
    	$this->assign("Order", $post["order"]);
    	$this->assign("Status", $post["status"]);
    	$this->assign("Link", $this->link($modulo));
    	
    	$this->assign("Head", $this->getHead());
    	
    	$this->assign("ListParam", $this->paramBySearch());
    	$this->assign("ListComparer", $this->getComparer());
    	$this->assign("ListOrder", $this->getOrder());
    	
    	$this->assign("PG_INICIO", $pg->getPaginacaoInicio());
    	$this->assign("PG_REG_POR_PAGINA", $pg->getRegistrosPorPagina());
    	$this->assign("PG_REG_AFETADOS", $pg->getRegistrosAfetados());
    	$this->assign("PG_LABEL", $pg->getLabelPaginacao());
    	
    	$this->display("principal.tpl");
    }
    
    public function gerenciar($obj, $modulo, $result=null) {
    	$this->loadScript();
    	$this->assign("Link", $this->link($modulo));
    	$this->assign("Head", $this->getHead());
    	$this->assign("Obj", $obj);
    	is_array($result) ? $this->assign("Error", $result) : $this->assign("Success", $result);
    	$this->display("gerenciar.tpl");
    }
    
    public function visualizar($modulo) {
    	$this->loadScript();
    	$this->assign("Link", $this->link($modulo));
    	$this->assign("Head", $this->getHead());
    	$this->display("visualizar.tpl");
    }
    
    public function display($template) {
        $this->smarty->display($template);
    }

    public function assign($assign, $method) {
        $this->smarty->assign($assign, $method);
    }

    public function getHead() {
        return $this->head;
    }

    public function setHead($value) {
        $this->head = $this->head . "\n\t" . $value;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function srcCss($file = "") {
        return AppConfig::srcCss() . $file;
    }

    public function srcImage($file = "") {
        return AppConfig::srcImage() . $file;
    }

    public function srcImage2($file = "") {
        return AppConfig::srcImage2() . $file;
    }

    public function SrcScript($file = "") {
        return AppConfig::srcScript() . $file;
    }

    public function IncludeCssNoSrc($cssFileName) {
        $this->setHead('<link href="' . $cssFileName . '" rel="stylesheet" type="text/css" />');
    }

    public function includeCss($cssFileName) {
        $cssFileName = $this->srcCss($cssFileName);
        $this->setHead('<link href="' . $cssFileName . '" rel="stylesheet" type="text/css" />');
    }

    public function IncludeScriptNoSrc($scriptFileName) {
        $this->setHead('<script type="text/javascript" src="' . $scriptFileName . '"></script>');
    }

    public function IncludeScript($scriptFileName) {
        $scriptFileName = $this->srcScript($scriptFileName);
        $this->setHead('<script type="text/javascript" src="' . $scriptFileName . '"></script>');
    }

    public static function home() {
        return AppConfig::urlPath();
    }

    public function loadScript() {
        $this->IncludeScript("jquery.min.js");
        $this->IncludeScript("bootstrap/js/bootstrap.min.js");
        $this->IncludeScript("moment.min.js");
        $this->IncludeScript("datetimepicker/js/bootstrap-datetimepicker.min.js");
        $this->IncludeScript("datetimepicker/js/bootstrap-datetimepicker.pt-BR.js");
        $this->IncludeScript("jquery.maskedinput.min.js");
        $this->IncludeScript("main.js");
        
        $this->IncludeCssNoSrc($this->home() . "scripts/js/bootstrap/css/bootstrap.min.css");
        $this->IncludeCssNoSrc($this->home() . "scripts/js/bootstrap/css/bootstrap-theme.min.css");
        $this->IncludeCssNoSrc($this->home() . "scripts/js/datetimepicker/css/bootstrap-datetimepicker.min.css");
    }

    protected function link($modulo) {
    	$path = "/$modulo/";
    	$link = array();
    	$link["list"] = $path . "principal";
    	$link["add"] = $path . "gerenciar";
    	$link["edit"] = $path . "gerenciar/";
    	$link["view"] = $path . "view/";
    	$link["delete"] = $path . "delete/";
    	$link["operation"] = $path . "operation";
    	return $link;
    }
    
    protected function paramBySearch() {
    	$param = array();
    	
    	$param[0]["attribute"] = "id";
    	$param[0]["value"] = "Código";
    	
    	$param[1]["attribute"] = "apikey";
    	$param[1]["value"] = "Código Identificador";
    	
    	return $param;
    }
    
    private function getOrder() {
    	$param = array();
    	
    	$param[0]["value"] = 1;
    	$param[0]["attribute"] = "Crescente";
    	
    	$param[1]["value"] = 2;
    	$param[1]["attribute"] = "Decrescente";
    	
    	return $param;
    }
    
    private function getComparer() {
    	$enum = new EnumInstructionSQL();
    	return $enum->enumComparer(); 
    }
}
