<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace application\modulos\Home;

use application\lib\AppController;

/**
 * Description of HomeController
 * Controller Responsável pela home do site
 * @author home
 */
class HomeController extends AppController {

    public function principalAction() {
    	$view = new HomeView("Home");
        $view->principal();
    }
    
    public function deleteRegisterAction($param) {
        
    }

    public function getRegisterAction($param) {
        
    }

    public function postManageAction($param, $post, $file) {
        
    }


}
