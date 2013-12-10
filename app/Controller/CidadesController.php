<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CidadeController
 *
 * @author evandro
 */
class CidadesController extends Controller {

    //put your code here

    public $uses = array('Cidade');
    public $helpers = array('Html', 'Form', 'Session');

    public function view() {
        $options = array(
            'fields' => array(
                'Cidade.id',
                'Cidade.nome',
            ),
            'limit' => 10,
            'recursive' => 0
        );

        $this->paginate = $options;

        // Roda a consulta, já trazendo os resultados paginados
        $cidades = $this->paginate('Cidade');

        // Envia os dados pra view
        $this->set('cidades', $cidades);
    }

    public function add() {
        $this->loadModel('Estado');
        $this->set('estados', $this->Estado->find('list', array('recursive' => 0, 'fields' => array('Estado.nome'))));

        if ($this->request->isPost()) {
            $this->Cidade->create();

            $dados = $this->request->data;

            if ($this->Cidade->save($dados)) {
                $this->Session->setFlash("Dados salvos com sucesso!");
                return $this->redirect(array('action' => 'view'));
            } else {
                //debug
                $message = $this->Cidade->validationErrors;

                $this->Session->setFlash($message, 'form_error', array('class' => 'alert alert-error'));
                //print_r($errors);
            }
        }
    }

    public function beforeFilter() {


        //parent::beforeFilter();
        // $this->redirect(array('action'=>'add'));
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Cidade->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect(array('action' => 'view'));
        }
    }

    public function update($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Cidade->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Cidade->id = $id;
            if ($this->Cidade->save($this->request->data)) {
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
