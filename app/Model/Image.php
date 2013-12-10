<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Image
 *
 * @author evandro
 */
class Image extends AppModel{
    
    public $useTable = 'images';

    public $belongsTo = array(
       'Produto'=> array(
         'className' => 'Produto',
            'foreignKey' => 'id_produtos'          
    ));
    

    public $validate = array(
      'nome' => array('rule'=> 'notEmpty')             
    );
    
    public function getImagens($id_produto = null)
    {
        if(!$id_produto)
            throw new NotFoundException(__('Id não foi encontrado'));
        
        $result = $this->find('all', array('conditions'=>array('Image.id_produtos'=> $id_produto), 
            'recursive'=>-1));
        
        if($result)
            return $result;
        
        return false;
    }
    
}
