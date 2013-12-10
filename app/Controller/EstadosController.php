<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstadosController
 *
 * @author evandro
 */
class EstadosController extends AppController {

    //put your code here

    public $helpers = array('Form', 'Html', 'Session');
    public $uses = array('Estado');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    public function view() {
        $options = array(
            'fields' => array(
                'Estado.id',
                'Estado.nome',
                'Estado.uf'
            ),
            'limit' => 10,
            'recursive' => 0
        );

        $this->paginate = $options;

        // Roda a consulta, já trazendo os resultados paginados
        $estados = $this->paginate('Estado');

        // Envia os dados pra view
        $this->set('estados', $estados);
    }

    public function add() {
        $this->loadModel('Paises');
        $this->set('paises', $this->Paise->find('list', array('recursive' => 0, 'fields' => array('Paise.nome'))));

        if ($this->request->isPost()) {
            $this->Estado->create();

            $dados = $this->request->data;

            if ($this->Estado->save($dados)) {
                $this->Session->setFlash("Dados salvos com sucesso!");
                return $this->redirect(array('action' => 'view'));
            } else {
                //debug
                $message = $this->Estado->validationErrors;

                $this->Session->setFlash($message, 'form_error', array('class' => 'alert alert-error'));
                //print_r($errors);
            }
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Estado->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect(array('action' => 'view'));
        }
    }

    public function update($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Estado->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Estado->id = $id;
            if ($this->Estado->save($this->request->data)) {
                $this->Session->setFlash(__('Your departament has been updated.'));
                return $this->redirect(array('action' => 'view'));
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }
        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }

}
?>
