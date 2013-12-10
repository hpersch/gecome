<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cidade
 *
 * @author evandro
 */
class Cidade extends AppModel{
    //put your code here
    public $belongsTo = array(
         'Estado'=> array(
         'className' => 'Estado',
            'foreignKey' => 'id_estado',   
        ));
    
    public $hasMany = array(
         'Endereco'=> array(
         'className' => 'Endereco',
            'foreignKey' => 'id_cidades',   
        ));
    
    public $validate = array(
       'nome'=> array('rule'=>'notEmpty')      
    );
}

?>
