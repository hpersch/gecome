<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SubDepartamento: Classe que implementa a table sub_departamentos
 *
 * @date: 1-10-2013
 * @author evandro
 */
class SubDepartamento extends AppModel{
        
    public $belongsTo =
        array(
        'Departamento'=> array(
         'className' => 'Departamento',
            'foreignKey' => 'id_departamentos',   
        ));
    
   public $hasMany = array(
        'Produto'=> array(
         'className' => 'Produto',
            'foreignKey' => 'id_sub_departamentos',   
        ));
    
    //validação no form
    public $validate = array(
      'nome'=> array('rule'=>'notEmpty'),
      'id_departamentos'=> array('rule'=>'notEmpty')
    );            
    
    /**
     * 
     * @param type $id
     * @return return mix, se ok retorna vetor, senão retorna false
     */
    public function getSubDepartamento($id)
    {
        if($id)
        {
            $result = $this->find('all', array('conditions'=>array('SubDepartamento.id'=>$id),
                'recursive'=>-1));
            
            if($result)
                return $result;
        }
        
        return false;
    }
    
}

?>
