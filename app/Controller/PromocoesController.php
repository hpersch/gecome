<?php

/**
 * Description of PromocoesController
 *
 * @author evandro
 */
class PromocoesController extends AppController {

    //private static $LINK_PRODUTOS = "/produtos/detalhes/";

    public $uses = array('Promocao');
    public $helpers = array('Html', 'Form', 'Session');

    /**
     * @return type void carrega produto_id e rendeniza form de add promocoes
     * @param type $id
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     */
    public function add($id = null) {
        if (!$id)
            throw new MethodNotAllowedException(__('id não encontrado'));

        $this->loadModel('Produto');
        $produtoId = $this->Produto->findById($id);

        if (!$produtoId)
            throw new NotFoundException(__('Invalid produto id'));

        $this->set('produto_id', $produtoId);
    }

    /**
     * @return type Description insere dados de promoções associados a um produto
     * @return type
     */
    public function insert() {
        if ($this->request->isPost()) {
            $dados = $this->request->data;

            self::$LINK_PRODUTOS .= $dados['Promocao']['id_produto'];

            if ($this->Promocao->save($dados)) {
                $this->Session->setFlash("Dados salvos com sucesso!");
                return $this->redirect(self::$LINK_PRODUTOS);
            } else {
                print_r($dados);

                $message = $this->Promocao->validationErrors;
                $this->Session->setFlash($message, 'form_error', array('class' => 'alert alert-error'));
            }
        }
    }

    /**
     * 
     * @param type $id
     * @return type
     * @throws MethodNotAllowedException
     */
    public function delete($id = null) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        //link criado para retornar a página de detalhes
        $produto_page = $this->criaLinkProduto($id);

        if ($this->Promocao->delete($id, false)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect($produto_page);
        }
    }

    public function update($id = null) {
        if (!$id) {
            throw new MethodNotAllowedException(__('Invalida atualização'));
        }

        $espeficacao = $this->Promocao->findById($id);
        if (!$espeficacao)
            throw new NotFoundException(__('Invalida atualização'));

        if ($this->request->is('post') || $this->request->is('put')) {
            //busca id do produto     
            $id_produto = $this->criaLinkProduto($id);

            $this->Promocao->id = $id;

            if ($this->Promocao->save($this->request->data)) {
                $this->Session->setFlash(__('Your especificação has been updated.'));
                return $this->redirect($id_produto);
            }
            $this->Session->setFlash(__('Unable to update your especificação.'));
        }
        if (!$this->request->data) {
            $this->request->data = $espeficacao;
        }
    }

    /**
     * 
     * @param type $id
     * @return type null or string, null se não achar produto
     * @throws MethodNotAllowedException
     */
    private function criaLinkProduto($id = null) {
        if (!$id)
            throw new MethodNotAllowedException(__('Não encontrado id'));


        //busca id do produto     
        $id_produto = $this->Promocao->find('all', array('conditions' => array('Promocao.id' => $id),
            'fields' => array('Promocao.id_produto')));

        if ($id_produto == null)
            throw new MethodNotAllowedException(__('não existe este produto'));

        //link criado para retornar a página de detalhes
        $prod = $id_produto[0]['Promocao']['id_produto'];
        self::$LINK_PRODUTOS .= $prod;

        return self::$LINK_PRODUTOS;
    }

}

?>
