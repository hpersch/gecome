<?php

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array('Auth', 'Session', 'Error', 'Cookie');
    public $uses = array('User');

    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->loginAction = array('action' => 'login', 'controller' => 'app');
        $this->Auth->loginRedirect = array('action' => 'login', 'controller' => 'app');
        $this->Auth->logoutRedirect = array('action' => 'login', 'controller' => 'app');
        $this->Auth->authError = 'You are not allowed to see that.';
    }

    public function _render($page) {
        if (Router::getParam('prefix', true) == 'admin') {
            $this->layout = "admin";
            $this->render("/Admin/" . $page);
        } else {
            $this->layout = "default";
            $this->render("/Pages/" . $page);
        }
    }

}
