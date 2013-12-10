<?php

/**
 * Description of ProdutoHasEspecificacoesController: faz a inserção dos campos 
 * da tabela especificação também, além de inserir as chaves extrangeiras nas tabelas
 * produtos e especificações.
 *
 * @author evandro
 */
class EspecificacoesController extends AppController {

    public $uses = array('Especificacao');
    public $helpers = array('Html', 'Form', 'Session');

    /**
     * 
     * @param type $id
     * @throws NotFoundException
     */
    public function add($id = null) {
        if (!$id)
            throw new NotFoundException(__('Invalid id'));


        $this->loadModel('Produto');

        $produtoId = $this->Produto->findById($id);

        if (!$produtoId)
            throw new NotFoundException(__('Invalid produto id'));

        $this->set('produto_id', $produtoId);
    }

    /**
     * @return type void description insere dados de especificacoes form
     */
    public function insert() {
        if ($this->request->isPost()) {
            $dados = $this->request->data;

            self::$LINK_PRODUTOS .= $dados['Especificacao']['id_produto'];

            if ($this->Especificacao->save($dados)) {
                $this->Session->setFlash("Dados salvos com sucesso!");
                return $this->redirect(self::$LINK_PRODUTOS);
            } else {
                $message = $this->Especificacao->validationErrors;
                $this->Session->setFlash($message, 'form_error', array('class' => 'alert alert-error'));
            }
        }
    }

    /**
     * @param type $id
     * @return type void
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     */
    public function update($id = null) {
        if (!$id)
            throw new MethodNotAllowedException(__('Invalida atualização'));

        $espeficacao = $this->Especificacao->findById($id);

        if (!$espeficacao)
            throw new NotFoundException(__('Invalida atualização'));

        if ($this->request->is('post') || $this->request->is('put')) {
            //busca id do produto     
            $id_produto = $this->criaLinkProduto($id);
            $this->Especificacao->id = $id;

            if ($this->Especificacao->save($this->request->data)) {
                $this->Session->setFlash(__('Your especificação has been updated.'));
                return $this->redirect($id_produto);
            }

            $this->Session->setFlash(__('Unable to update your especificação.'));
        }

        if (!$this->request->data)
            $this->request->data = $espeficacao;
    }

    /**
     * @param type $id
     * @return type void
     * @throws MethodNotAllowedException
     */
    public function delete($id = null) {
        if ($this->request->is('get'))
            throw new MethodNotAllowedException();

        //link criado para retornar a página de detalhes
        $produto_page = $this->criaLinkProduto($id);

        if ($this->Especificacao->delete($id, false)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect($produto_page);
        }
    }

    /**
     * @param type $id
     * @return type null or string, null se não achar produto
     * @throws MethodNotAllowedException
     */
    private function criaLinkProduto($id = null) {
        if (!$id)
            throw new MethodNotAllowedException(__('Não encontrado id'));

        //busca id do produto     
        $id_produto = $this->Especificacao->find('all', array('conditions' => array('Especificacao.id' => $id),
            'fields' => array('Especificacao.id_produto')));

        if ($id_produto == null)
            throw new MethodNotAllowedException(__('não existe este produto'));

        //link criado para retornar a página de detalhes
        $prod = $id_produto[0]['Especificacao']['id_produto'];
        self::$LINK_PRODUTOS .= $prod;

        return self::$LINK_PRODUTOS;
    }

}

?>
