<?php

/**
 * Description of EnderecosController
 * @author evandro
 */
class EnderecosController extends AppController {

    public $helpers = array('Form', 'Html', 'Session', 'Js');
    public $components = array('RequestHandler');
    public $uses = array('Endereco');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    public function view() {
        $options = array(
            'fields' => array(
                'Endereco.id',
                'Endereco.nome',
                'Endereco.cep',
                'Endereco.tipo',
                'Endereco.rua',
                'Endereco.numero',
                'Endereco.complemento',
                'Endereco.descricao',
                'Endereco.bairro'
            ),
            'limit' => 10,
            'recursive' => 0
        );

        $this->paginate = $options;

        // Roda a consulta, já trazendo os resultados paginados
        $enderecos = $this->paginate('Endereco');

        // Envia os dados pra view
        $this->set('enderecos', $enderecos);
    }
    
    public function getPessoa()
    {                                           
             //tempo de cache => 5 minutos 
        
             if(!$this->Session->check('PF.nome'))             
                 echo "Não está carregando";
                          
            $vet = array('Pessoasfisica');
             
            $vet['nome'] = $this->Session->read('PF.nome');
            $vet['cpf'] = $this->Session->read('PF.cpf');
            $vet['rg'] = $this->Session->read('PF.rg');
            $vet['data_nascimento'] = $this->Session->read('PF.data_nascimento');
            $vet['sexo'] = $this->Session->read('PF.sexo');
            $vet['email'] = $this->Session->read('PF.email');    
            $vet['senha'] = $this->Session->read('PF.senha');                
            
            return $vet;             
    } 
        
    public function add()
    {                    
        $this->loadModel('Estado');       
        
        $this->loadModel('Telefone');               
        $this->Telefone->removeValidate();

        //@debug mostra vetor    
        $vet = $this->getPessoa();
        print_r($vet);

        $this->set('estados', $this->Estado->find('list', array('recursive' => 0, 'fields' => array('Estado.nome'))));

        if ($this->request->isPost()) {
            $this->Endereco->create();
            $dados = $this->request->data;

            if ($this->Endereco->save($dados)) {
                $this->Session->setFlash("Dados salvos com sucesso!");
                return $this->redirect(array('action' => 'view'));
            } else {
                //debug
                $message = $this->Endereco->validationErrors;
                $this->Session->setFlash($message, 'form_error', array('class' => 'alert alert-error'));
                //print_r($errors);
            }
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Endereco->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect(array('action' => 'view'));
        }
    }

    public function update($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Endereco->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Endereco->id = $id;
            if ($this->Endereco->save($this->request->data)) {
                $this->Session->setFlash(__('Your departament has been updated.'));
                return $this->redirect(array('action' => 'view'));
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }
        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }
    
    public function fimCadastroPessoa()
    {
        if($this->request->is('post'))
        {
            print_r($this->request->data);
        }               
        
        $this->redirect($url);
    } 
}

?>
