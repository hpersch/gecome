<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DepartamentosController
 * @date: 01-10-2013
 * @author evandro
 */
class DepartamentosController extends AppController {

    public $uses = array('Departamento');
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    
    
    public function admin_novo() {
        $this->_render("departamentos/novo");
    }

    public function admin_editar($id) {
        $this->set('depto', $this->Departamento->find('first', array('id' => $id)));
        $this->_render("departamentos/editar");
    }

    public function admin_delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Departamento->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect(array('action' => 'view'));
        }
    }

    public function admin_update($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Departamento->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Departamento->id = $id;
            if ($this->Departamento->save($this->request->data)) {
                $this->Session->setFlash(__('Your departament has been updated.'));
                return $this->redirect(array('action' => 'view'));
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }
        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }

    public function admin_salvar() {
        if ($this->request->isPost()) {
            $this->Departamento->create();
            $dados = $this->request->data;
            $dados['Departamento']['data_criacao'] = date("Y-m-d");

            if ($this->Departamento->save($dados)) {
                $this->Session->setFlash("Dados cadastrados com sucesso!");
                return $this->redirect("/departamentos/view");
            } else {
                //debug
                $message = $this->Departamento->validationErrors;

                $this->Session->setFlash($message, 'form_error', array('class' => 'alert alert-error'));
                //print_r($errors);
            }
        }
    }

}

?>
