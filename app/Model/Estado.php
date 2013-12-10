<?php

/**
 * Description of Estado
 *
 * @author evandro
 */
class Estado extends AppModel{
    //put your code here
    
    
    
    public $hasMany = array(
         'Endereco'=> array(
         'className' => 'Endereco',
            'foreignKey' => 'estado_id',   
        )        
    );
       
    public $validate = array(
       'nome'=> array('rule'=>'notEmpty')      
    );                    
}
?>
