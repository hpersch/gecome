<?php

/**
 * Description of MarcasController
 * @date: 29-09-2013
 * @author evandro
 */
class MarcasController extends AppController {

    //put your code here
    public $helpers = array('Html', 'Form', 'Session');
    public $uses = array('Marca');
    public $components = array('Paginator');

    public function view() {
        $options = array(
            'fields' => array('Marca.nome'),
            'limit' => 10,
            'recursive' => 0
        );

        $this->paginate = $options;

        // Roda a consulta, já trazendo os resultados paginados
        $marcas = $this->paginate('Marca');

        // Envia os dados pra view
        $this->set('marcas', $marcas);
    }

    public function add() {
        if ($this->request->isPost()) {
            $this->Marca->create();
            $dados = $this->request->data;

            if ($this->Marca->save($dados)) {
                $this->Session->setFlash("Dados salvos com sucesso!");
                return $this->redirect("/marcas/view");
            } else {
                //debug
                $message = $this->Marca->validationErrors;

                $this->Session->setFlash($message, 'form_error', array('class' => 'alert alert-error'));
                //print_r($errors);
            }
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Marca->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function update($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Marca->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Marca->id = $id;
            if ($this->Marca->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been updated.'));
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
