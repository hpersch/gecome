<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdutosController
 * @date: 02-10-2013
 * @author evandro
 */
class ProdutosController extends AppController {

    //put your code here
    public $uses = array('Produto');
    public $helpers = array('Html', 'Form', 'Session');

    public function view() {
        //$this->set('produtos', $this->Produto->find('all',array('recursive' => 0)));

        $options = array(
            'fields' => array(
                'Produto.id',
                'Produto.nome',
                'Produto.codigo',
                'Produto.descricao',
                'Produto.preco',
                'Produto.quantidade',
                'Produto.promocao',
                'Produto.data_cadastro',
                'Produto.id_marcas',
                'Produto.id_sub_departamentos'
            ),
            'limit' => 10,
            'recursive' => 0
        );

        $this->paginate = $options;

        // Roda a consulta, já trazendo os resultados paginados
        $produtos = $this->paginate('Produto');

        // Envia os dados pra view
        $this->set('produtos', $produtos);
    }

    public function add() {
        $this->loadModel('Marca');
        $this->set('marcas', $this->Marca->find('list', array('recursive' => 0, 'fields' => array('Marca.nome'))));

        $this->loadModel('SubDepartamento');
        $this->set('subdepartamentos', $this->SubDepartamento->find('list', array('recursive' => 0, 'fields' => array('SubDepartamento.nome'))));

        if ($this->request->isPost()) {
            $this->Produto->create();

            $dados = $this->request->data;

            print_r($dados);

            if ($this->Produto->save($dados)) {
                $this->Session->setFlash("Dados salvos com sucesso!");
                return $this->redirect(array('action' => 'view'));
            } else {
                //debug
                $message = $this->Produto->validationErrors;

                $this->Session->setFlash($message, 'form_error', array('class' => 'alert alert-error'));
                //print_r($errors);
            }
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Produto->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect(array('action' => 'view'));
        }
    }

    public function update($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Produto->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Produto->id = $id;
            if ($this->Produto->save($this->request->data)) {
                $this->Session->setFlash(__('Your departament has been updated.'));
                return $this->redirect(array('action' => 'view'));
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }
        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }

    public function viewByMarca() {
        
    }

    //mostra detalhes de produtos e botão cadastrar especificações e imagens
    public function detalhes($id = null) {
        if (!$id)
            throw new NotFoundException(__('Invalid produto'));

        $produto = $this->Produto->findById($id);
        $this->set('produto', $produto);

        $this->loadModel('Marca');
        $this->set('marca', $this->Marca->getMarca($produto['Produto']['id_marcas']));

        $this->loadModel('SubDepartamento');
        $this->set('subdepartamento', $this->SubDepartamento->getSubDepartamento
                        ($produto['Produto']['id_sub_departamentos']));

        $this->loadModel('Especificacao');
        $this->set('especificacoes', $this->Especificacao->getEspecificacoes($id));

        $this->loadModel('Promocao');
        $this->set('promocoes', $this->Promocao->getPromocoes($id));

        $this->loadModel('Image');
        $this->set('images', $this->Image->getImagens($id));
    }

}

?>
