<?php

/**
 * Description of Telefone
 *
 * @author evandro
 */
class Telefone extends AppModel{
    //put your 
   
    const FISICO    = 0;
    const JURIDICO  = 1;

    public $validate = array
            (
                'numero' => array('rule'=>'notEmpty')        
            );     

public function removeValidate()
{
    $this->validator()->remove('numero');
}
}