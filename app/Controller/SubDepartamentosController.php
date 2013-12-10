<?php

/**
 * @Description of SubDepartamentosController
 * @date: 1-10-2013
 * @author evandro
 */
class SubDepartamentosController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');
    public $uses = array('SubDepartamento');
    public $components = array('Paginator');

    public function view() {
        //$subDepto = $this->SubDepartamento->find('all', array('recursive'=> -1));
        //$this->set('SubDepto', $subDepto);

        $options = array(
            'fields' => array('SubDepartamento.id', 'SubDepartamento.nome'),
            'limit' => 10,
            'recursive' => 0
        );

        $this->paginate = $options;

        // Roda a consulta, já trazendo os resultados paginados
        $subdepartamento = $this->paginate('SubDepartamento');

        // Envia os dados pra view
        $this->set('SubDepto', $subdepartamento);
    }

    public function add() {
        $this->loadModel('Departamento');
        $this->set('departamentos', $this->Departamento->find('list', array('recursive' => 0, 'fields' => array('Departamento.nome'))));

        if ($this->request->isPost()) {
            $this->SubDepartamento->create();

            $dados = $this->request->data;

            if ($this->SubDepartamento->save($dados)) {
                $this->Session->setFlash("Dados salvos com sucesso!");
                return $this->redirect(array('action' => 'view'));
            } else {
                //debug
                $message = $this->SubDepartamento->validationErrors;

                $this->Session->setFlash($message, 'form_error', array('class' => 'alert alert-error'));
                //print_r($errors);
            }
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->SubDepartamento->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect(array('action' => 'view'));
        }
    }

    public function update($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->SubDepartamento->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->SubDepartamento->id = $id;
            if ($this->SubDepartamento->save($this->request->data)) {
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
