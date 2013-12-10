<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pessoasfisica
 *
 * @author evandro
 */

APP::uses('Session', 'Component');

class Pessoasfisica extends AppModel {
    
    public $useTable = 'pessoasfisicas';        
    
    public $validate = array(
        'nome'=> array('rule' => 'notEmpty'),
        'cpf'=> array('rule' => 'isUnique', 'message' => 'Usuario já existe em nosso cadastro'),
        'data_nascimento' => array('rule'=> array('date'), 'allowEmpty' => false, 'message'=>'data inválida'),
        'sexo'=> array('rule' => 'notEmpty'),
        'email'=> array('rule' => 'email', 'allowEmpty' => false),
        'senha' => array(
            'equaltofield' => array(
            'rule' => array('equaltofield','repass'),
            'message' => 'Require the same value to password.',
            //'allowEmpty' => false,
           // 'required' => true,
            //'last' => false, // Stop validation after this rule
            'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        )
    );
    
    function equaltofield($check,$otherfield)
    {
        //get name of field
        $fname = '';
        foreach ($check as $key => $value){
            $fname = $key;
            break;
        }
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname];
    }              
}
