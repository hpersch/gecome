<?php

class PagesController extends AppController {

    public $name = 'Pages';
    public $helpers = array('Html', 'Session');
    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function view($page, $id = NULL) {
        switch ($page):
            case "home":
                $this->page = "home";
                break;
            case 'departamentos':
                $this->loadModel('Departamento');
                $this->set('deptos', $this->Departamento->find('all'));
                $this->page = "departamentos/listar";
                break;
            case 'subdepartamentos':
                $this->loadModel('SubDepartamento');
                $this->set('deptos', $this->SubDepartamento->find('all'));
                $this->page = "subdepartamento/listar";
                break;
            default:
                $this->page = "404";
        endswitch;
        $this->_render($this->page);
    }

    public function admin_view($page, $id = NULL) {
        switch ($page):
            case "home":
                $this->page = "home";
                break;
            case 'departamentos':
                $this->loadModel('Departamento');
                $this->set('deptos', $this->Departamento->find('all'));
                $this->page = "departamentos/listar";
                break;
            case 'subdepartamentos':
                $this->loadModel('SubDepartamento');
                $this->set('deptos', $this->SubDepartamento->find('all'));
                $this->page = "subdepartamento/listar";
                break;
            default:
                $this->page = "404";
        endswitch;
        $this->_render($this->page);
    }
}
