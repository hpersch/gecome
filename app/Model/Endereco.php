<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Endereco
 *
 * @author evandro
 */
class Endereco extends AppModel{
    
    public $belongsTo = array(
         'Estado'=> array(
         'className' => 'Estado',
            'foreignKey' => 'estado_id',   
        ));
    
    //validações do form de inserção e atualização
    public $validate = array(
       'nome'=> array('rule'=>'notEmpty'),         
       'rua'=> array(array('rule'=> array('notEmpty'), 'message'=>'rua invalida')),
       'cep'=> array(array('rule'=> array('isCep'), 'message'=>'cep inválido'),
               array('rule'=> array('notEmpty'))),
       'numero'=> array(array('rule'=>'notEmpty'),
                        array('rule'=>'numeric', 'message'=>'Valor deve ser um número')), 
       'bairro'=> array('rule'=>'notEmpty'), 
       'nome'=> array('rule'=>'notEmpty'), 
       'estados_id'=> array('rule'=>'notEmpty')              
    );
                
    //valida cpf formatos
    public function isCep($data)
    {        
        $valor = array_shift($data);
                
        $cep = trim($valor);
        
        // expressao regular para avaliar o cep
        $avaliaCep = ereg("^[0-9]{5}-[0-9]{3}$", $cep);
        
        // verifica o resultado
        if(!$avaliaCep) 
            return false;
        
        return true;        
    }    
}

?>
