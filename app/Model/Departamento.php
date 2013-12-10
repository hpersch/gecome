<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Departamento
 *
 * @author evandro
 */
class Departamento extends AppModel {    
    public $hasMany = array(
        'SubDepartamento'=> array(
         'className' => 'SubDepartamento',
            'foreignKey' => 'id_departamentos',   
        )
        );
    
    public $validate = array(
      'nome'=> array('rule'=>'notEmpty')        
    );            
}

?>
