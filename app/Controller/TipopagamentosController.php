<?php

/**
 * Description of TipopagamentosController
 *
 * @author evandro
 */
class TipopagamentosController extends AppController {

    //put your code here
    public $uses = array('Tipopagamento');
    public $helpers = array('Html', 'Form', 'Session');

    public function view() {
        $result = $this->Tipopagamento->find('all', array(
            'order' => array('Tipopagamento.nome' => 'asc')
        ));



        $this->set('pagamentos', $result);
    }

    //add novo pagamento
    public function add() {
        if ($this->request->isPost()) {
            $this->Tipopagamento->create();
            $dados = $this->request->data;

            if ($this->Tipopagamento->save($dados)) {
                $this->Session->setFlash("Dados cadastrados com sucesso!");
                return $this->redirect("/tipospagamentos/");
            } else {
                $message = $this->Tipopagamento->validationErrors;
                $this->Session->setFlash($message, 'form_error', array('class' => 'alert alert-error'));
            }
        }
    }

    //delete valor linha tabela
    public function delete($id = null) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Tipopagamento->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect(array('action' => 'view'));
        }
    }

}
