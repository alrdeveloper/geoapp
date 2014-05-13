<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace application\modulos\Home;

use application\lib\AppView;

/**
 * Description of HomeView
 * Camada de visualização Módulo Home
 * @author home
 */
class HomeView extends AppView {

    public function principal() {
        $this->loadScript();
        $this->assign("Head", $this->getHead());
        $this->display("principal.tpl");
    }

}
