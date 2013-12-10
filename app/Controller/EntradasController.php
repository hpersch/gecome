<?php

/**
 * Description of EntradasControllers
 *
 * @author evandro
 */
class EntradasController extends AppController {

    public $uses = array('User', 'Pessoasfisica');
    public $helpers = array('Html', 'Form', 'Session');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    //funcao replicada    
    public function retornaTempo() {
        $tempo = date("Y:m:d:H:i:s");
        list($ano, $mes, $dia, $hora, $minutos, $segundos) = explode(":", $tempo);

        return $ano + $mes + $dia + $hora + $minutos + $segundos;
    }

    public function logincadastro() {
        $this->loadModel('User');
        $this->loadModel('Pessoasfisica');

        if ($this->Session->check('PF')) {
            $tempo_agora = $this->retornaTempo();
            if ($tempo_agora > (int) $this->Session->read('PF.time_end')) {
                $this->Session->delete('PF');
            }
        }        

        //carrega página com forms
        $this->render('cadastro_login');
    }

    /*
     * @ parameters vetor com dados das entradas de usuários
     * @ return void
     */

    public function criaCacheDados($dados) {
        //guarda variavies para auto preenchimento            
        $this->Session->write('PF.time_start', $this->retornaTempo());
        //tempo de cache => 5 minutos
        $this->Session->write('PF.time_end', $this->retornaTempo() + (1));
        $this->Session->write('PF.step', '1');
        $this->Session->write('PF.nome', 'Green');
        $this->Session->write('PF.cpf', 'Green');
        $this->Session->write('PF.rg', 'Green');
        $this->Session->write('PF.data_nascimento', 'Green');
        $this->Session->write('PF.sexo', 'Green');
        $this->Session->write('PF.email', 'Green');
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
             $this->Session->write('PF.time_end', $this->retornaTempo() + (1));             
             $this->Session->write('PF.step', '1');
             $this->Session->write('PF.nome', 'Green');
             $this->Session->write('PF.cpf', 'Green');
             $this->Session->write('PF.rg', 'Green');
             $this->Session->write('PF.data_nascimento', 'Green');
             $this->Session->write('PF.sexo', 'Green');
             $this->Session->write('PF.email', 'Green'); 
     }
                 
}
