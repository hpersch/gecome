<?php

/**
 * Description of PessoasfisicasController
 *
 * @author evandro
 */
class PessoasfisicasController extends AppController {

    public $uses = array('Pessoasfisica');
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Cookie');

    //permite que controller seja acesso na parte externa do site
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    /*
     * @ return tempo real somando ano+mes+dia+hora+minuto+segundo
     */

    public function retornaTempo() {
        $tempo = date("Y:m:d:H:i:s");
        list($ano, $mes, $dia, $hora, $minutos, $segundos) = explode(":", $tempo);

        return $ano + $mes + $dia + $hora + $minutos + $segundos;
    }
      
     /*
      * @ return tempo real somando ano+mes+dia+hora+minuto+segundo
      */   
     public function retornaTempo()
     {
         $tempo = date("Y:m:d:H:i:s");
         list($ano, $mes, $dia, $hora, $minutos, $segundos) = explode(":", $tempo);
        
         return $ano + $mes + $dia + $hora + $minutos + $segundos;        
     }
          
     /*
      * @ parameters vetor com dados das entradas de usuários
      * @ return void
      */
     public function criaCacheDados($dados)
     {
             //guarda variavies para auto preenchimento            
             $this->Session->write('PF.time_start', $this->retornaTempo());
             //tempo de cache => 5 minutos
             $this->Session->write('PF.time_end', $this->retornaTempo() + (10));             
             $this->Session->write('PF.step', '1');
             $this->Session->write('PF.nome', $dados['Pessoasfisica']['nome']);
             $this->Session->write('PF.cpf', $dados['Pessoasfisica']['cpf']);
             $this->Session->write('PF.rg', $dados['Pessoasfisica']['rg']);
             $this->Session->write('PF.data_nascimento', $dados['Pessoasfisica']['data_nascimento']);
             $this->Session->write('PF.sexo', $dados['Pessoasfisica']['sexo']);
             $this->Session->write('PF.email', $dados['Pessoasfisica']['email']); 
             $this->Session->write('PF.senha', $dados['Pessoasfisica']['senha']);              
     }   
     
    //add valores no cache de sessão
    public function add() {
        if ($this->Session->check('PF.step')) {
            $tempo_agora = $this->retornaTempo();
            if ($tempo_agora > $this->Session->read('PF.time_end')) {
                $this->Session->delete('PF');
            }
        }
        
        if($this->request->isPost())      
         {              
             $this->Pessoasfisica->create();
             $dados = $this->request->data;                   
                          
             $this->Pessoasfisica->set($dados);
              
             //se errar, manda para página anterior
             if(!$this->Pessoasfisica->validates())
             {
                 $message = $this->Pessoasfisica->validationErrors;                  
                 
                 $this->criaCacheDados($dados);
                 
                 $this->Session->setFlash($message, 'form_error', 
                         array('class'=> 'alert alert-error'));  
                 $this->redirect('/cadastro_login');
                 
                 //colocar ação para inserir tudo junto
                 
                 
             }                
            else 
            {
                $this->criaCacheDados($dados);                     
                $this->redirect(array('controller'=> 'enderecos', 'action'=> 'add'));                                
            }                               
         }         
    }    
}
