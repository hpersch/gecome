<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 * @Description: classe model marca, uma marca tem muitos produtos.
 * @date: 28-09-2013
 * @author evandro
 */
class Marca  extends AppModel{
    
    //relacionamento
    public $hasMany = array(
        'Produto'=> array(
         'className' => 'Produto',
            'foreignKey' => 'id_marcas'            
        )
        );
    
    //validação de campos da tabela
    public $validate = array(
      'nome'=> array('rule'=>'notEmpty')        
    ); 
    
    /**
     * 
     * @param type $id
     * @return mix, se ta certo retorna um vetor, se não retorna false
     */
    public function getMarca($id)
    {
        if($id)
        {
            $result = $this->find('all', array('conditions'=>array('Marca.id'=>$id),
                'recursive'=> -1));
            
            if($result)
                return $result;
        }
        
        return false;
    }
    
    public function getNada()
    {
        return 'nda';
    }
}

?>
