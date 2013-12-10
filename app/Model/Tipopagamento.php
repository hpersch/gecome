<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tipopagamento
 *
 * @author evandro
 */
class Tipopagamento extends AppModel{
    
    public $useTable = 'tipopagamentos';
    
     public $validate = array(      
      'nome' => array('rule'=> 'notEmpty')        
    );         
}
